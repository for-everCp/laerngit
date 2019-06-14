
window.onload = function(){
	var fm = document.getElementsByTagName("form")[0];

	fm.onsubmit = function(event){
		console.log("123")
		var fd = new FormData(fm);
		var xhr = new XMLHttpRequest();
		xhr.upload.onprogress = function(event){//onprogress每间隔100毫秒执行一次
			//通过事件对象感知附件上传情况
			alert("456");
			var loaded = event.loaded;
			var total = event.total;
			var per = Math.floor((loaded/total)*100)+"%"
			document.getElementById("d2").style.width = per;
			document.getElementsByTagName("span")[0].innerHTML = per;
		}
		xhr.onreadystatechange = function(){  //属性回调函数
		if(this.readyState == 4 && this.status == 200){
			alert("123");
			alert(xhr.responseText);
		}
		}
		xhr.open("POST","./index.php",true);
		//xhr.setRequestHeader('content-type','application/x-www-form-urlencoded');
		xhr.send(fd);
		event.preventDefault();
	}
}
