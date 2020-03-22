<?php
namespace App\Http\Controllers\Index;

use App\Models\AdminSetting;
use App\Models\Pin;
use App\Http\Controllers\Controller;
use App\Mail\ContactForm;

class IndexHomesController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show our home page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showHome()
    {
        return view('content.index.homes.home');
    }

    /**
     * Show the what we do page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showWhatWeDo()
    {
        return view('content.index.homes.what-we-do');
    }

    /**
     * Show the past work page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showPastWork()
    {
        $all = Pin::all();
        $colors = $this->pinColors($all);
        $pins = [];
        foreach ($all as $pin) {
            $pins[] = [
                'lat' => explode(', ', $pin->address)[0],
                'lon' => explode(', ', $pin->address)[1],
                'label' => $pin->label,
                'year' => $pin->year,
                'color' => $colors[$pin->year]
            ];
        }

        $plans = [
        	'Single Story, Basement (1180 SF)',
			'Single Story, Basement (1445 SF)',
			'Single Story, Basement (1560 SF)',
			'Single Story, Basement (1700 SF)',
			'Single Story, Basement (1900 SF)',
			'Single Story, Basement (2010 SF)',
			'Single Story, Basement (2250 SF)',
			'Single Story, Slab on Grade (3320 SF)',
			'Two Story, Basement (2215 SF)',
			'Two Story, Slab on Grade (1350 SF)',
		];

        $data = [
            'pins' => $pins,
            'colors' => $colors,
			'plans' => $plans,
        ];
        return view('content.index.homes.past-work', $data);
    }

    /**
     * Show the our partners page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showOurPartners()
    {
        return view('content.index.homes.our-partners');
    }

    /**
     * Show the about us page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showAboutUs()
    {
        return view('content.index.homes.about-us');
    }

    /**
     * Show the contact page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showContact()
    {
        return view('content.index.homes.contact');
    }

    /**
     * Handle the contact form
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function handleContact()
    {

        $data = \Request::all();

        $spam_message = 'Sorry, our system thinks that you are a spam bot, NO email will be delivered!';
        if ( empty($data['_recaptcha']) ) {
            throw new \AppExcp($spam_message);
        }

        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', 'https://www.google.com/recaptcha/api/siteverify', [
            'form_params' => [
                'secret' => '6LdULqYUAAAAAMXZ_YsM2Zc-C-eZBC3Ablmo3J_A',
                'response' => $data['_recaptcha'],
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(), true);

        if ( !is_array($result) || !$result['success'] || $result['score'] < 0.5 ) {
            throw new \AppExcp($spam_message);
        }
        $setting = AdminSetting::where('key', 'email')->first();

        $mail_data = [
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'comments' => $data['comments'],
        ];
        \Mail::to($setting->value)->send(new ContactForm($mail_data));

        return response()->json(['success' => true]);

    }

    /**
     * Show the quick estimate page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showQuickEstimate()
    {
        return view('content.index.homes.quick-estimate');
    }

    /**
     * Show the documents page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showDocuments()
    {
        return view('content.index.homes.documents');
    }

    /**
     * Return array of all colors for years
     * 
     * @param $pins
     */
    protected function pinColors($pins)
    {
        $all_colors = ['blue', 'orange', 'red', 'green', 'ltblue', 'purple', 'yellow', 'pink'];
        $years = array_unique($pins->pluck('year')->toArray());
        sort($years);
        $colors = [];
        foreach ($years as $index => $year) {
            $colors[$year] = isset($all_colors[$index]) ? $all_colors[$index] : $all_colors[$index - count($all_colors)];
        }
        return $colors;
    }


}