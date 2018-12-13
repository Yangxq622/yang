//构建合法字符串
function regStr(){
	var lowerList = [];
	var upperList = [];
	var numList = [];
	var otherList = ["$","_"];
	for (var i = 97; i < 97+26; i++) {
		var code =  String.fromCharCode(i);
		lowerList.push(code);
	}
	for (var i = 65; i < 65+26; i++) {
		var code = String.fromCharCode(i);
		upperList.push(code);
	}
	for (var i = 0; i < 10; i++) {
		numList.push(i+"");
	}
	var bigList = lowerList.concat(upperList,otherList,numList);
	return bigList;
}
//随机数字
function randNum (num,str) {
	var newStr = "";
	for (var i = 0; i < num; i++) {
		var index = Math.floor(Math.random()*str.length);
		newStr += str[index];
	}
	return newStr;
}
//随机不重复的数字
function randNoRepeat(num,str){
	var newStr = "";
	for (var i = 0; i < num; i++) {
		var index = Math.floor(Math.random()*str.length);
		if (newStr.indexOf(str[index]) == -1) {
			newStr += str(index);
		}else{
			i--;
		}
	}
	return newStr;
}
// //事件监听 兼容//满足条件直接执行，不需要返回值
// function addEventListener(obj,type,fn,flag){
// 	flag = flag || false;
// 	if(obj.addEventListener){
// 		obj.addEventListener(type,fn,flag);
// 	}else{
// 		obj.attachEvent("on"+type,fn);
// 	}
// }
// //监听移除 兼容
// function  removeEventListener(obj,type,fn,flag){
// 	flag = flag || false;
// 	if(obj.removeEventListener){
// 		obj.removeEventListener(type,fn,flag);
// 	}else{
// 		obj.detachEvent("on"+type,fn);
// 	}
// }
//$方法
// function $(str, parent) {
// 	parent = parent || document; //设置函数的默认参数
// 	if (str.indexOf(" ") != -1) {//有空格就是层级
// 		var list = str.split(" ");//将字符串利用空格进行拆分["ul",".middle","span"]
// 		for (var i = 0; i < list.length; i++) {
// 			var item = list[i];//ul   .middle  span
// 			if (i == list.length - 1) {
// 				parent = $(item, parent);//parent = ul  .middle
// 			} else {
// 				if (item.indexOf("#") == 0) {
// 					parent = $(item, parent);
// 				} else {
// 					parent = $(item, parent)[0];//parent = ul  .middle
// 				}
// 			}
// 		}
// 		return parent;
// 	} else {

// 		var firstCode = str.charAt(0);//取出第一个字符
// 		switch (firstCode) {
// 			case "#":
// 				return parent.getElementById(str.substring(1));
// 			case ".":
// 				return parent.getElementsByClassName(str.substring(1));
// 			default:
// 				return parent.getElementsByTagName(str);
// 		}
// 	}
// }
//上一个节点（兼容）
function previousElementSibling(obj){
	if(obj.previousElementSibling){
		return obj.previousElementSibling;
	}else{
		return obj.previousSibling;
	}
}
//下一个节点（兼容）
function nextElementSibling(obj){
	if(obj.nextElementSibling){
		return obj.nextElementSibling;
	}else{
		return obj.nextSibling;
	}
}
//获取元素的样式具体内容 兼容
function getStyleArr(obj,attr){
	if(window.getComputedStyle){
		return window.getComputedStyle(obj)["attr"];
	}else{
		return obj.currentStyle[attr];
	}
}
//兼容 getElementsByClassName
function getElementsByClassName(className){
	var nodeList = document.getElementsByTagName("*");
	var list = [];
	for(var i = 0;i<nodeList.length;i++){
		var node = nodeList[i];
		if(node.className){  //判断有没有className
			//如果有，在拆分，避免因包含引起的bug
			var classNameList = node.split(" ");
			//在判断是否包含
			if(indexOf(className,classNameList) != -1){
				list.push(node);
			}
		}
	}
	alert(list.length);
}
//indexof封装
function indexOf(item,gather){
	var index = -1;
	for(var  i =0;i<gather.length;i++){
		if (item == gather[i]) {
			index = i;
		}
	}
	return index;
}
//cookie查询
function getCookie(key){
	if(document.cookie){
		var cookieList =document.cookie.split("; ");
		for(var i = 0;i<cookieList.length;i++){
			var cookie = cookieList[i];//取出每一个cookie  'key=value'
			var list = cookie.split("=");//["key","value"]
			var itemkey = list[0];
			var itemValue = list[1];
			if (itemkey == key) {
				return itemValue;
			}
		}
	}
}
//cookie增删改
function  setCookie(key,value,days){
	var date = new Date();
	date.setDate(date.getDate() + days);
	document.cookie = key + "=" + value + ";expires=" + date;
}