<?php




function uploadAvatar($file, $path){
    $name = time().'-'.str_replace(' ', '-', $file->getClientOriginalName());
    $file->move(public_path($path),$name);
    return $path.'/'.$name;
}

function uploadFile($file, $path = 'audios',$count){
    $name = $count.time().'_'.str_replace(' ', '-', $file->getClientOriginalName());
    $file->move(public_path($path),$name);
    return $path.'/'.$name;
}

function sendMail($data)
{
    Mail::send($data['view'], ['data' => $data['data']], function ($message) use ($data) {
        $message->to($data['to'], $data['name'])->subject($data['subject']);
    });
}

function countCompanies()
{
    $comp=\App\Models\FollowCompany::where('user_id',auth()->user()->id)->count();
    return $comp;
}

function countJobs()
{
    $jobs=\App\Models\Favorite::where('user_id',auth()->user()->id)->count();
    return $jobs;
}

function findJobs($com_id)
{
    $jobs=\App\Models\Jobs::where('company_id',$com_id)->orderBy('created_at','DESC')->get();
    return $jobs;
}











?>
