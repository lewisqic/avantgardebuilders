<?php
namespace App\Http\Controllers\Account;

use App\Models\User;
use App\Models\Document;
use App\Models\AdminSetting;
use Facades\App\Services\DocumentService;
use App\Http\Controllers\Controller;
use App\Mail\HelpForm;

class AccountIndexController extends Controller
{


    /**
     * Show our dashboard page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showDocuments()
    {
        $documents = Document::where('user_id', \Auth::user()->id)->orderBy('created_at', 'DESC')->get();
        $docs = [];
        foreach ($documents as $doc) {
            $docs[$doc->type][] = $doc;
        }
        ksort($docs);
        $data = [
            'documents' => $docs
        ];
        return view('content.account.index.documents', $data);
    }

    /**
     * Download a document file
     *
     * @param $id
     */
    public function downloadDocument($id)
    {
        $document = Document::findOrFail(base64_decode($id));
        $path = storage_path('app/public/' . $document->path);
        return response()->download($path, $document->filename);
    }

    /**
     * Handle the help form
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function handleHelp()
    {

        $data = \Request::all();
        $setting = AdminSetting::where('key', 'email')->first();
        $mail_data = [
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'comments' => $data['comments'],
        ];
        \Mail::to($setting->value)->send(new HelpForm($mail_data));

        return response()->json(['success' => true]);

    }

}