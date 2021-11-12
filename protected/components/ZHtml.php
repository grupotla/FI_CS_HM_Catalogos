<?php
/*
Yii 1.1: Drop down list with enum values for column of type ENUM >+> incorporate into giix 
report it140
Click to follow10 followers
 
The enumDropDownList
Adding it to giix' CrudCode
Let's say our table 'mug' has a column named 'color' of the type ENUM('red','green','blue'). 
We want to replace the textfield for the attribute color in the create and update forms of a 'mug' with a drop down list, which has the enum values as options. 
The main code was contributed by zaccaria in the forum (see this post).
*/

class ZHtml extends CHtml
{
    public static function enumDropDownList($model, $attribute, $htmlOptions=array())
    {
      return CHtml::activeDropDownList( $model, $attribute, self::enumItem($model,  $attribute, $htmlOptions), $htmlOptions);
    }

    public static function enumRadioButtonList($model, $attribute, $htmlOptions=array())
    {
      return CHtml::activeRadioButtonList( $model, $attribute, self::enumItem($model,  $attribute, $htmlOptions), $htmlOptions);
    }
        
    public static function enumCheckBoxList($model, $attribute, $htmlOptions=array())
    {
      return CHtml::activeCheckboxList( $model, $attribute, self::enumItem($model,  $attribute, $htmlOptions), $htmlOptions);
    }
       
    public static function enumItem($model,$attribute, $htmlOptions=array()) {
    	
    	$values = array();
    	
    	//if ($htmlOptions["espacio"] == 1)    	
    	//	$values[]="";
    	
        $attr=$attribute;
        self::resolveName($model,$attr);
        preg_match('/\((.*)\)/',$model->tableSchema->columns[$attr]->dbType,$matches);
        foreach(explode("','", $matches[1]) as $value) {
                $value=str_replace("'",null,$value);
                $values[$value]=Yii::t('enumItem',$value);
        }
        return $values;
    } 




        
    public static function isValidEmail2(string $email) : bool
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return false;
        }

        //Get host name from email and check if it is valid
        $email_host = array_slice(explode("@", $email), -1)[0];

        // Check if valid IP (v4 or v6). If it is we can't do a DNS lookup
        if (!filter_var($email_host,FILTER_VALIDATE_IP, [
            'flags' => FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE,
        ])) {
            //Add a dot to the end of the host name to make a fully qualified domain name
            // and get last array element because an escaped @ is allowed in the local part (RFC 5322)
            // Then convert to ascii (http://us.php.net/manual/en/function.idn-to-ascii.php)
            $email_host = idn_to_ascii($email_host.'.');

            //Check for MX pointers in DNS (if there are no MX pointers the domain cannot receive emails)
            if (!checkdnsrr($email_host, "MX")) {
                return false;
            }
        }

        return true;
    }



       
    public static function isValidEmail(string $email) 
    {

         // return preg_match_all("/(?![[:alnum:]]|@|-|_|\.)./",$email);


             // SET INITIAL RETURN VARIABLES

        $emailIsValid = FALSE;

        // MAKE SURE AN EMPTY STRING WASN'T PASSED
    
            if (!empty($email))
            {
                // GET EMAIL PARTS
    
                    $domain = ltrim(stristr($email, '@'), '@') . '.';
                    $user   = stristr($email, '@', TRUE);
    
                // VALIDATE EMAIL ADDRESS
    
                    if
                    (
                        !empty($user) &&
                        !empty($domain) &&
                        checkdnsrr($domain)
                    )
                    {$emailIsValid = TRUE;}
            }
    
        // RETURN RESULT
    
            return $emailIsValid;



    }



}
