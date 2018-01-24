<?php 
use Carbon\Carbon;

/***********************************************/
// get tag
// function getTag($id_post){
//     $ModelPost=new ModelPost;
//     $Post=$ModelPost->getItem($id_post);
//     $arr_id=explode('-', $Post['id_tag']);
//     $Mtag=new ModelTag;
//     $lTag=$Mtag->getItemsIn($arr_id);
//     return $lTag;
// }
/***********************************************/
// get slug
function getSlug($slug){
    $str=explode("-",$slug);
    $lengt=count($str);
    $id=$str[$lengt-1];
    $name="";
    for ($i=0; $i < $lengt-1; $i++) { 
        if($i==$lengt-2){
            $name=$name.$str[$i];
        }else{
            $name=$name.$str[$i]."-";
        }
    }
    $kq=[
        'name'=>$name,
        'id'=>$id
    ];
    return $kq;
}
/***********************************************/
// hiện danh mục
function cate_parent ($data, $select=0){
	foreach ($data as $value) {
		$id=$value['id'];
		$name=$value['name'];
		if($select!=0 && $id==$select){
			echo "<option selected='selected' value='$id'>$name</option>";
		}else{
			echo "<option value='$id'>$name</option>";
		}
	}
}

// đổi tên file
function change_name($str){
    $chang_name=explode('.', $str);
    $end=count(explode('.', $str));
    $str=str_replace( '.'.$chang_name[$end-1], '', $str );
    $now = Carbon::now()->timestamp;
    $str=$str.'-'.$now.'.'.$chang_name[$end-1];
    return $str;
}
// đổi chuổi ->...
function change_str($str, $max, $check){
    $i=strlen($str);
    if($check){
        while ( $i<= $max) {
            $str=$str.'.';
            $i=$i+1;
        }
    }
    if($i>$max){
        return substr($str, 0, $max).'...';
    }else{
        return $str;
    }
}
?>