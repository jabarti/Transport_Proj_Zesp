<?php
/* * *********************************************
 * Filename:    PHP_Functions.php
 * 
 * Created:     2014-01-11
 *
 * @author      Bartosz M. Lewiński <jabarti@wp.pl>
 * ********************************************* */

function Logged(){
//	if(isset($_SESSION['uzytkID']) AND !empty($_SESSION['uzytkID']) AND isset($_SESSION['user'])){   // Mówi o zmiennych dostępnych w obecnej sesji
	if(isset($_SESSION['uzytkID']) AND !empty($_SESSION['uzytkID']) ){   // Mówi o zmiennych dostępnych w obecnej sesji
//            echo "<br>Logged() = true<br>";
//            echo $_SESSION['uzytkID'];
            return true;
        }else{
//            echo $_SESSION['uzytkID'];
//            echo "<br>Logged() = false<br>";
//            unset($_COOKIE['user']);
            return false;
	}
}

function db_query($sql)
{
	$ret = @mysql_query($sql);
	
	if (!$ret)
		die('MySQL query failed: '.$sql.' Error message: '.mysql_error());//,$sql,mysql_error());
	return $ret;
}

function unsetter(){
//    foreach ($_SESSION as $key){
////        echo '<br>$_SESSION['.$key.'] - destroyed';
//            unset($_SESSION[$key]) ;//or die("error");
//    }
//        foreach ($_COOKIE as $key){
//        echo '<br>$_COOKIE['.$key.'] - destroyed';
//            unset($_COOKIE[$key]) ;//or die("error");
//    }
}
function DisplayArr($array){
    foreach($array as $key => $val){
        echo '<br>$Key: '.$key.' => '.$val;
    }
}

function LoadMainView($Main_view_name){
    switch ($Main_view_name){
        case 'main':
//            echo '<br>linia: '.__LINE__.' from: '.__FILE__.' <br>Main View_name: '.$Main_view_name. " <-tak?";
//            $_SESSION['title'] = 'Main | Główna';
            return HDD_VIEWS_PATH.'main.php';
        break;
    
        case 'login':
//            echo '<br>linia: '.__LINE__.' from: '.__FILE__.' <br>Main View_name: '.$Main_view_name. " <-tak?";
//            $_SESSION['title'] = 'Login | Logowanie';
            return HDD_VIEWS_PATH.'LogInPanel.php';
        break;
    
        case 'register':
//            echo '<br>linia: '.__LINE__.' from: '.__FILE__.' <br>Main View_name: '.$Main_view_name. " <-tak?";
//            $_SESSION['title'] = 'Register | Rejestracja';
            return HDD_VIEWS_PATH.'RegisterPanel.php';
        break;        
    
        default:
//            echo '<br>linia: '.__LINE__.' from: '.__FILE__.' <br>Main View_name: '.$Main_view_name. " <-tak?";
//            $_SESSION['title'] = 'Main | Główna';// | Default';
            return HDD_VIEWS_PATH.'main.php';
        break; 
    }
}

function LoadView($view_name){
    switch ($view_name){
        case 'Form_Contact':
//            echo '<br>linia: '.__LINE__.' from: '.__FILE__.' <br>View_name: '.$view_name. " <<-tak???";
//            $_SESSION['title'] = 'Main | Główna';
            return HDD_VIEWS_PATH.$view_name.'.php';
        break;
    
        case 'OtherInfo':
//            echo '<br>linia: '.__LINE__.' from: '.__FILE__.' <br>View_name: '.$view_name. " <<-tak???";
//            $_SESSION['title'] = 'Main | Główna';
            return HDD_STABLEVIEWS_PATH.$view_name.'.php';
        break;    
    
        case 'CompInfo':
//            echo '<br>linia: '.__LINE__.' from: '.__FILE__.' <br>View_name: '.$view_name. " <<-tak???";
//            $_SESSION['title'] = 'Login | Logowanie';
            return HDD_STABLEVIEWS_PATH.$view_name.'.php';
        break;
    
        default:
//            echo '<br>linia: '.__LINE__.' from: '.__FILE__.' <br>View_name: '.$view_name. " <<-tak???";
//            $_SESSION['title'] = 'Main | Główna | Default';
            return HDD_VIEWS_PATH.$view_name.'.php';
        break; 
}
}

function IncludeClassFile($file){
    if(include HDD_CLASSES_PATH.$file){
//        echo '<br>include 1 HDD_CLASSES_PATH .'.$file.' - OK';
    }else{
        if(include HTTP_CLASSES_PATH.$file){
//            echo '<br>include 2 HTTP_CLASSES_PATH.'.$file.' - OK';
        }else{
            if (include CLASSES_PATH.DIRECTORY_SEPARATOR.$file){ 
//                echo '<br>include 3 CLASSES_PATH.DIRECTORY_SEPARATOR.'.$file.' - OK';
            }else{
                echo '<br>No file: '.$file.' NOT Loaded - NOT OK';
            }
        }
    }
}
function Form($id, $file, $title, $name, $place, $method='post'){
    $file = HTTP_MODELS_PATH.$file;
    isset($method)?$method:'post';
    switch($place){
        case 'head':
            echo '<form id="'.$id.'" action="'.$file.'" method="'.$method.'">
                    <table>
                        <th colspan="2">'.$title.'</th>';
        break;
        case 'foot':
            echo '          <td></td>
                            <td style="text-align: right;"><input type="submit" name="'.$name.'" value="Wyślij"></td>
                        </tr>
                    </table>
                </form>';
        break;
    }
}

function CreateTextForm($array, $checkerror = true, $readonly=false){
    foreach ($array as $key => $value){
        if($readonly){
            $readonly = 'readonly=readonly';
        }else{ 
            $readonly='';
        }
        
        if (isset($_SESSION[$key])){
            $value = $_SESSION[$key];
        }
        if ($checkerror){
            echo'<tr>
                    <td><span id="red">*</span>'.$key.': </td>
                    <td><input type="text" id="'.$key.'" name="'.$key.'" value="'.$value.'" '.$readonly.' "></input> </td>
                </tr>
                <tr>
                    <td colspan="2"><div id="error'.$key.'" class="error"></div></td>
                </tr>';
        }else{
            echo'<tr>
                    <td>'.$key.': </td>
                    <td><input type="text" id="'.$key.'" name="'.$key.'" value="'.$value.'" '.$readonly.' "></input> </td>
                </tr>                
                <tr>
                    <td colspan="2"><div id="error'.$key.'"></div></td>
                </tr>';            
        }
    }
}

function CreateHiddenTextForm($array){
    foreach ($array as $key => $value){
        
        if (isset($_SESSION[$key])){
            $value = $_SESSION[$key];
        }
        echo'<tr>
                <td><input type="hidden" colspan = 2 id="'.$key.'" name="'.$key.'" value="'.$value.'"></input> </td>
             </tr>';
    }
}

function CreateTextareaForm($array, $cols, $rows){
    foreach ($array as $key => $value){
        
        if (isset($_SESSION[$key])){
            $value = $_SESSION[$key];
        }
        echo'<tr>
                <td>'.$key.'</td>
                <td><textarea id="'.$key.'"   name="'.$key.'"   cols="'.$cols.'" rows="'.$rows.'">'.$value.'</textarea></td>
             </tr>';
    }
}
//<tr>
//            <td>Użytkownik/Login:</td>
//            <!--td><input type="text" name="uzytkownik"></td--> <!-- To MA BYć w wersji WORK!!!!!!!!!!!!!!!!!!!!!!!!! -->
//            <td><select name="uzytkownik" >	 <!-- To jest absolutnie niepoprawne i ma by� USUNIETE!!!! -->
//                    <option>jabarti</option>
//                    <option>admin</option>
//                    <option>spedytor</option>
//                    <option>Alus</option>
//            </select></td>
//	</tr>
function CreateOptionForm($name, $array){
    echo'<td>'.$name.': </td>
         <td><select name="'.$name.'">';
    foreach ($array as $key => $val){
        echo'<option>'.$val.'</option>';
    }
    echo'   </select></td>
	</tr>';
}


function InsertInto($table, $formSubmitName){
    $SQL ='';
    $arr='';
    if (isset($_POST[$formSubmitName])){
        $SQL .= 'INSERT INTO `'.$table.'` (';
            
        foreach ($_POST as $key => $value){
            echo '<br>$POST["'.$key.'"] = '.$value;
            if ($key != $formSubmitName)
                $arr[$key] = $key;
        }
        
        $SQL .= '`'.join( "`,`", $arr).'`) VALUES (';
        $arr = '';

        foreach ($_POST as $key => $value){
        if ($key != $formSubmitName)
            $arr[$value] = $value;
        }  
    
        $SQL .= '"'.join( '","', $arr).'");';
          
        echo "<br>Oto SQL: ".$SQL;
        if(mysql_query($SQL)){
            return true;
        } else {
            return false;
        }
    }
}

function CreateTable ($array){
    
}
?>