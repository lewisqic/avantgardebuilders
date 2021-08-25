<?php

namespace App\Services;

use App\Models\Document;
use Illuminate\Http\Request;

class DocumentService extends BaseService
{

    /**
     * @var null
     */
    protected $document = null;


    /**
     * Load an existing document record
     *
     * @param  array  $id
     * @return object
     */
    public function load($id)
    {
        $this->document = Document::findOrFail($id);
        return $this;
    }


    /**
     * create a new document
     *
     * @param  array  $data
     * @return object
     */
    public function create($data)
    {

        if ( isset($data['file']) ) {
            $path = $this->uploadFile($data['file']);
            $data['path'] = $path;
            $data['filename'] = $data['file']->getClientOriginalName();
        } else {
            fail('Missing file');
        }
        
        // create document and permissions
        $document = Document::create($data);
        return $document;
    }


    /**
     * update a document
     *
     * @param  array  $data
     * @return object
     */
    public function update($data)
    {

        if ( isset($data['delete_file']) ) {
            $this->deleteFile($this->document->path);
            $data['path'] = null;
            $data['filename'] = null;
        } else if ( isset($data['file']) ) {
            $path = $this->uploadFile($data['file']);
            $data['path'] = $path;
            $data['filename'] = $data['file']->getClientOriginalName();
        }

        // update document
        $this->document->fill($data)->save();

        return $this->document;
    }

    /**
     * return array of documents data for datatables
     * @return array
     */
    public function dataTables($data)
    {
        $trashed = isset($data['with_trashed']) && $data['with_trashed'] == 1 ? true : false;
        $documents = Document::when($trashed, function ($query) {
            return $query->withTrashed();
        })->get();
        $documents_arr = [];
        foreach ( $documents as $document ) {
            $documents_arr[] = [
                'id' => $document->id,
                'class' => !is_null($document->deleted_at) ? 'text-danger' : null,
                'user' => $document->user ? $document->user->name : '',
                'label' => $document->label,
                'type' => $document->type,
                'filename' => $document->filename,
                'created_at' => [
                    'display' => $document->created_at->toFormattedDateString(),
                    'sort' => $document->created_at->timestamp
                ],
                'action' => \Html::dataTablesActionButtons([
                    'download' => 'admin/documents/' . $document->id . '/download',
                    'edit' => 'admin/documents/' . $document->id . '/edit?_ajax=false',
                    'delete' => 'admin/documents/' . $document->id,
                    'restore' => !is_null($document->deleted_at) ? 'admin/documents/' . $document->id : null,
                ])
            ];
        }
        return $documents_arr;
    }

    /**
     * Upload an file
     * @param $file
     *
     * @return null
     * @throws \AppExcp
     */
    public function uploadFile($file)
    {
        $filename = null;
        if ( !empty($file) && $file->isValid() ) {
            $filename = $file->store('documents', 'public');
        }
        return $filename;
    }

    /**
     * Delete an existing file
     * @param $file
     *
     * @return null
     */
    public function deleteFile($file)
    {
        \Storage::disk('public')->delete($file);
        return null;
    }


}