<?php
Yii::import('application.extensions.phpmailer.JPhpMailer');
class SendEmail{

	public function SendEmail(array $from, array $sto, $subject, $message)
	{
		$mail=new JPhpMailer;

        $mail->IsSMTP();                                     
        $mail->Host = 'localhos';
        $mail->setFrom($from[0], $from[1]);
        $mail->Subject = $subject;
        $mail->MsgHTML($message);
        $mail->addAddress($sto[0], $sto[1]);
        $mail->send();
	}
?>

[Common]
Edition=
Editor=C:\Program Files\Sublime Text 3\sublime_text.exe
Browser=
Debug=0
Debuglevel=0
Language=en
TomcatVisible=1
Minimized=0

[LogSettings]
Font=Arial
FontSize=10

[WindowSettings]
Left=639
Top=316
Width=682
Height=441

[Autostart]
Apache=1
MySQL=1
FileZilla=0
Mercury=1
Tomcat=0

[Checks]
CheckRuntimes=1
CheckDefaultPorts=1

[ModuleNames]
Apache=Apache
MySQL=MySQL
FileZilla=FileZilla
Mercury=Mercury
Tomcat=Tomcat

[EnableModules]
Apache=1
MySQL=1
FileZilla=1
Mercury=1
Tomcat=1

[EnableServices]
Apache=1
MySQL=1
FileZilla=1
Tomcat=1

[BinaryNames]
Apache=httpd.exe
MySQL=mysqld.exe
FileZilla=filezillaserver.exe
FileZillaAdmin=filezilla server interface.exe
Mercury=mercury.exe
Tomcat=tomcat7.exe

[ServiceNames]
Apache=Apache2.4
MySQL=mysql
FileZilla=FileZillaServer
Tomcat=Tomcat7

[ServicePorts]
Apache=80
ApacheSSL=443
MySQL=3307
FileZilla=21
FileZillaAdmin=14147
Mercury1=25
Mercury2=79
Mercury3=105
Mercury4=106
Mercury5=110
Mercury6=143
Mercury7=2224
TomcatHTTP=8080
TomcatAJP=8009
Tomcat=8005

[UserConfigs]
Apache=
MySQL=
FileZilla=
Mercury=
Tomcat=

[UserLogs]
Apache=
MySQL=
FileZilla=
Mercury=
Tomcat=
