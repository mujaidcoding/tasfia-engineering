<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\SmtpSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class MailController extends Controller
{
    public function SmtpSettings()
    {
        $smtp = SmtpSetting::first();
        return view('backend.admin.auth.mail.index', compact('smtp'));

    } //End Method



    public function UpdateSmtp(Request $request)
    {
        // Find the first record or create a new one if not found
        SmtpSetting::updateOrCreate(
            [],
            [
                'mailer' => $request->mailer,
                'host' => $request->host,
                'port' => $request->port,
                'username' => $request->username,
                'password' => $request->password,
                'encryption' => $request->encryption,
                'from_address' => $request->from_address,
                'from_name' => $request->from_name,
            ]
        );
        // Update .env file
        $this->updateEnvFile($request);

        return redirect()->back()->with('update', [
            'type' => 'success',
            'message' => 'SMTP Settings Update successful',
        ]);
    }


    private function updateEnvFile(Request $request)
    {
        $envFilePath = base_path('.env');

        // Read the existing .env file
        $envContent = File::get($envFilePath);

        // Update values in .env content
        $envContent = Str::replaceMatches('/MAIL_MAILER=(.*)/', 'MAIL_MAILER=' . $request->mailer, $envContent);
        $envContent = Str::replaceMatches('/MAIL_HOST=(.*)/', 'MAIL_HOST=' . $request->host, $envContent);
        $envContent = Str::replaceMatches('/MAIL_PORT=(.*)/', 'MAIL_PORT=' . $request->port, $envContent);
        $envContent = Str::replaceMatches('/MAIL_USERNAME=(.*)/', 'MAIL_USERNAME=' . $request->username, $envContent);
        $envContent = Str::replaceMatches('/MAIL_PASSWORD=(.*)/', 'MAIL_PASSWORD=' . $request->password, $envContent);
        $envContent = Str::replaceMatches('/MAIL_ENCRYPTION=(.*)/', 'MAIL_ENCRYPTION=' . $request->encryption, $envContent);
        $envContent = Str::replaceMatches('/MAIL_FROM_ADDRESS=(.*)/', 'MAIL_FROM_ADDRESS=' . $request->from_address, $envContent);
        $envContent = Str::replaceMatches('/MAIL_FROM_NAME=(.*)/', 'MAIL_FROM_NAME=' . $request->from_name, $envContent);

        // Write the updated content back to .env file
        File::put($envFilePath, $envContent);

        // Reload the environment variables
        Artisan::call('config:clear');
    }

}
