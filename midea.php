<?php
ob_start();
$API_KEY = '1252567247:AAFT-82YmCsWVOn4d9OOV2VvvVZqfxBFsOo';
echo "api.telegram.org/bot$API_KEY/setwebhook?url=".$_SERVER['SERVER_NAME']."".$_SERVER['SCRIPT_NAME'];
define('API_KEY',$API_KEY);
function bot($method,$datas=[]){
$url = "https://api.telegram.org/bot".API_KEY."/".$method;
$ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    $res = curl_exec($ch);
if(curl_error($ch)){
    var_dump(curl_error($ch));
}else{
    return json_decode($res);
}
}

$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$id = $message->from->id;
$chat_id = $message->chat->id;
$text = $message->text;
$admin = "348759045";
$chat_id2 = $update->callback_query->message->chat->id;
$message_id2 =  $update->callback_query->message->message_id;
$message_id = $update->message->message_id;
$data = $update->callback_query->data;
$ch = "@meaallh100"; # معرف القناة الي النشر بيهه
$user = $update->from->username;
$name = $update->from->first_name;
$caption = $message->caption;

if($text == "/start" and $id != $admin){
	bot("sendmessage",[
	'chat_id'=>$chat_id,
	'text'=>"🔴❌هذا الأمر ليس لك خاص بالأدمن❌🔴
@$user
$name
",
	]);
	}

if($text == "/start" and $id == $admin){
	bot("sendmessage",[
	'chat_id'=>$chat_id,
	'text'=>"اهلا وسهلا بك سيدي
@$user
$name
",
	]);
	}
	$ph = array("1","2","3","4","5","6","7","8","9","10")
$video_id= $update->message->video->file_id;
$audio_id= $update->message->audio->file_id;
$document_id = $update->message->document->file_id;
$photo_id= $update->message->photo[$ph]->file_id;
if($message->video){
bot('Sendvideo',[
'chat_id'=>$ch,
'video'=>$video_id,
'caption'=>"$caption

#مع_الله
@meaallh100
",
]);
bot("sendmessage",[
'chat_id'=>$admin,
'text'=>"🎥 || لقد تم ارسال فيديو الى {$ch} 
بواسطة : $name
المعرف : @$user
",
]);
}

if($message->audio){
bot('Sendaudio',[
'chat_id'=>$ch,
'audio'=>$audio_id,
'caption'=>"$caption

#مع_الله
@meaallh100
",
]);
bot("sendmessage",[
'chat_id'=>$admin,
'text'=>"🔊 || لقد تم ارسال مقطع صوتي الى {$ch} 
بواسطة : $name
المعرف : @$user
",
]);
}

if($message->photo){
bot('Sendphoto',[
'chat_id'=>$ch,
'photo'=>$photo_id,
'caption'=>"$caption

#مع_الله
@meaallh100
",
]);
bot("sendmessage",[
'chat_id'=>$admin,
'text'=>"🖼️ || لقد تم ارسال صورة الى {$ch} 
بواسطة : $name
المعرف : @$user
",
]);
}

if($message->document){
bot('Senddocument',[
'chat_id'=>$ch,
'document'=>$document_id,
'caption'=>"$caption

#مع_الله
@meaallh100
",
]);
bot("sendmessage",[
'chat_id'=>$admin,
'text'=>"🗄️ || لقد تم ارسال ملف الى {$ch} 
بواسطة : $name
المعرف : @$user
",
]);
}

$a="

#مع_الله
@meaallh100";

if($update->channel_post){
bot("editMessagetext",[
"chat_id"=>$update->channel_post->chat->id,
"text"=>$update->channel_post->text." \n". $a,
"message_id"=>$update->channel_post->message_id,
]);
bot("sendmessage",[
'chat_id'=>$admin,
'text'=>"🇾🇪||لقد تم تعديل ملف وسائط في
@meaallh100
",
]);
}


if($update->channel_post){
bot("editMessageCaption",[
"chat_id"=>$update->channel_post->chat->id,
"caption"=>$update->channel_post->caption." \n". $a,
"message_id"=>$update->channel_post->message_id,
]);
bot("sendmessage",[
'chat_id'=>$admin,
'text'=>"🇾🇪||لقد تم تعديل منشور نصي
@meaallh100
",
]);
}

$number = str_word_cunt($text);

if($text != "/start" and $number > 20){
	bot("sendmessage",[
	'chat_id'=>$ch,
	'text'=>"$text
\n
#مع_الله
@meaallh100",
]);
bot("sendmessage",[
'chat_id'=>$admin,
'text'=>"🇾🇪||لقد ارسلت نص الى
@meaallh100
عبر $name
",
]);
}
