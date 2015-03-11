<?php
//适用环境： PHP5.2.x  / mysql 5.0.x 
/**
* Check检测类
*/
Class Check{
         /**
         * IsUsername函数:检测是否符合用户名格式
         * $Argv是要检测的用户名参数
        * $RegExp是要进行检测的正则语句
         * 返回值:符合用户名格式返回用户名,不是返回false
         */
        function IsUsername($Argv){
                $RegExp='/^[a-zA-Z]{1}[a-zA-Z0-9-_.]{4,20}$/'; //由大小写字母跟数字._-组成并且以字母为首长度在5-20字符
                return preg_match($RegExp,$Argv)?$Argv:false;
        }
		/*
			密码
		*/
		function IsPassword($Argv){
                $RegExp='/^[a-zA-Z0-9]{6,20}$/'; //由大小写字母跟数字组成并且长度在6-20字符
                return preg_match($RegExp,$Argv)?$Argv:false;
        }
		/*
			重复密码
		*/
		function IsRePassword($Argv,$Argv2){
                return $Argv==$Argv2?$Argv:false;
        }
		/*
			头像
		*/
		function IsHeadphoto($Argv){
			$arr=split(".",$Argv);
			$type=$arr[1];
            return ($Argv.length!=0) && (!(type=="jpg"||type=="gif"||type=="png"))?$Argv:false;
        }
		/**
         * IsNickname函数:检测参数的值是否为正确的昵称格式(Beta)
         * 返回值:是正确的昵称格式返回昵称格式,不是返回false
         */
         function IsNickname($Argv){
                 $RegExp='/^[\x{4e00}-\x{9fa5}a-zA-Z0-9]+$/u'; //由数字字母中文组成
				 //Copy From DZ
                 return preg_match($RegExp,$Argv)?$Argv:false;
         }
		 /**
		 * 年龄
         * 函数:检测参数的值是否为正确的格式(Beta)
         * 返回值:是正确的昵称格式返回,不是返回false
         */
         function IsAge($Argv){
                $RegExp='/^[0-9]{1,4}$/'; //由数字组成并且长度在1-4字符
				return preg_match($RegExp,$Argv)?$Argv:false;
         }
         /**
         * IsMail函数:检测是否为正确的邮件格式
         * 返回值:是正确的邮件格式返回邮件,不是返回false
         */
        function IsMail($Argv){
                $RegExp='/\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/';///^[a-z0-9][a-z\.0-9-_] @[a-z0-9_-] (?:\.[a-z]{0,3}\.[a-z]{0,2}|\.[a-z]{0,3}|\.[a-z]{0,2})$/i
                return preg_match($RegExp,$Argv)?$Argv:false;
        }
       	/**
         * IsIntroduction函数:检测是否为正确的自我介绍格式
         * 返回值:是正确的自我介绍格式返回邮件,不是返回false
         */
        function IsIntroduction($Argv){
                $RegExp='/^[\x{4e00}-\x{9fa5}a-zA-Z0-9]{5,100}$/u'; //由数字、字母、中文组成并且长度在5-100字符
                return preg_match($RegExp,$Argv)?$Argv:false;
        }
         /**
         * IsSmae函数:检测参数的值是否相同
        * 返回值:相同返回true,不相同返回false
         */
         function IsSame($ArgvOne,$ArgvTwo,$Force=false){
                 return $Force?$ArgvOne===$ArgvTwo:$ArgvOne==$ArgvTwo;
         }
       
         /**
        * IsQQ函数:检测参数的值是否符合QQ号码的格式
        * 返回值:是正确的QQ号码返回QQ号码,不是返回false
         */
         function IsQQ($Argv){
                $RegExp='/^[1-9][0-9]{5,11}$/';
                return preg_match($RegExp,$Argv)?$Argv:false;
        }
       
          /**
         * IsMobile函数:检测参数的值是否为正确的中国手机号码格式
           * 返回值:是正确的手机号码返回手机号码,不是返回false
        */
        function IsMobile($Argv){
                $RegExp='/^(?:13|15|18)[0-9]{9}$/';
                return preg_match($RegExp,$Argv)?$Argv:false;
         }
       
         /**
         * IsTel函数:检测参数的值是否为正取的中国电话号码格式包括区号
         * 返回值:是正确的电话号码返回电话号码,不是返回false
        */
         function IsTel($Argv){
                 $RegExp='/[0-9]{3,4}-[0-9]{7,8}$/';
                 return preg_match($RegExp,$Argv)?$Argv:false;
         }
       
         /**
         * IsChinese函数:检测参数是否为中文
         * 返回值:是返回参数,不是返回false
         */
        function IsChinese($Argv,$Encoding='utf8'){
                 $RegExp = $Encoding=='utf8'?'/^[\x{4e00}-\x{9fa5}] $/u':'/^([\x80-\xFF][\x80-\xFF]) $/';
                 Return preg_match($RegExp,$Argv)?$Argv:False;
        }
}
?>