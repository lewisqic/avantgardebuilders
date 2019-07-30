<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Document;
use App\Models\AdminSetting;
use Facades\App\Services\DocumentService;
use App\Http\Controllers\Controller;


class AdminDocumentController extends Controller
{

    /**
     * Show the documents list page
     *
     * @return view
     */
    public function index()
    {
        return view('content.admin.documents.index');
    }

    /**
     * Output our datatabalse json data
     *
     * @return json
     */
    public function dataTables()
    {
        $data = DocumentService::dataTables(\Request::all());
        return response()->json($data);
    }

    /**
     * Show the documents create page
     *
     * @return view
     */
    public function create()
    {
        $settings = AdminSetting::where('key', 'document_types')->first();
        $types = explode("\r\n", $settings->value);
        $data = [
            'title' => 'Add',
            'users' => User::where('type', User::MEMBER_ID)->orderBy('first_name')->get(),
            'types' => $types,
        ];
        return view('content.admin.documents.create-edit', $data);
    }

    /**
     * Show the documents create page
     *
     * @return view
     */
    public function edit($id)
    {
        $settings = AdminSetting::where('key', 'document_types')->first();
        $types = explode("\r\n", $settings->value);
        $document = Document::findOrFail($id);
        $data = [
            'title' => 'Edit',
            'document' => $document,
            'users' => User::where('type', User::MEMBER_ID)->orderBy('first_name')->get(),
            'types' => $types,
        ];
        return view('content.admin.documents.create-edit', $data);
    }

    /**
     * Show an document
     *
     * @return view
     */
    public function show($id)
    {
        $document = Document::findOrFail($id);
        $data = [
            'document' => $document,
        ];
        return view('content.admin.documents.show', $data);
    }

    /**
     * Create new document record
     *
     * @return redirect
     */
    public function store()
    {
        // create the document
        $document = DocumentService::create(\Request::all());

        \Msg::success('Document has been <strong>added</strong>');
        return redir('admin/documents');
    }

    /**
     * Create new document record
     *
     * @return redirect
     */
    public function update($id)
    {

        // update document
        $document = DocumentService::load($id)->update(\Request::all());

        \Msg::success('Document has been <strong>updated</strong>');
        return redir('admin/documents');
    }

    /**
     * Delete an document record
     *
     * @return redirect
     */
    public function destroy($id)
    {
        $document = DocumentService::delete($id);
        \Msg::success('Document has been <strong>deleted</strong> ' . \Html::undoLink('admin/documents/' . $document->id));
        return redir('admin/documents');
    }

    /**
     * Restore a document
     *
     * @return redirect
     */
    public function restore($id)
    {
        $document = DocumentService::restore($id);
        \Msg::success('Document has been <strong>restored</strong>');
        return redir('admin/documents');
    }

    /**
     * Download an document
     *
     * @return view
     */
    public function download($id)
    {
        $document = Document::findOrFail($id);
        return response()->download(storage_path('app/public/' . $document->path), $document->filename);
    }


}
