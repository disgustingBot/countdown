d=document;w=window;c=console;
// alternates a class from a selector of choice, example:
// <div class="someButton" onclick="altClassFromSelector('activ', '#navBar')"></div>
const altClassFromSelector=(clase,selector)=> {
  const x=d.querySelector(selector);
  if(x.classList.contains(clase)){
    x.classList.remove(clase)
  }else{
    x.classList.add(clase)
  }
}



var correctCaptcha = function(response) {
  alert(response);
  var url='https://www.google.com/recaptcha/api/siteverify';
  var dataNames=['secret','response'];
  var dataValues=['6LdrMsgUAAAAALibglcP8-LSLA7YMkVUorWUnq4l',response];
  postAjaxCall(url, dataNames, dataValues).then(v=>{
    try{ c.log(v)
      // d.getElementById(id).innerHTML=JSON.parse(v).length;
      respuesta=JSON.parse(v);
      c.log(respuesta);
    }catch(err){
      c.log(err);c.log(v)
    }
  })
};

function captchaVerified(){
  var boton = d.querySelector('.butttonSend');
  boton.removeAttribute('disabled');
}






function postAjaxCall(url,dataNames,dataValues){// return a new promise.
	return new Promise((resolve,reject)=>{// do the usual XHR stuff
		var req=new XMLHttpRequest();
		req.open('post',url);
		//NOW WE TELL THE SERVER WHAT FORMAT OF POST REQUEST WE ARE MAKING
		req.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
		req.onload =()=>{if(req.status>=200&&req.status<300){resolve(req.response)}else{reject(Error(req.statusText));console.log("ERROR")}}
		req.onerror=()=>{reject(Error("Network Error"))}// handle network errors
		// prepare the data to be sent
		let data;
		for(var i=0;i<dataNames.length;i++){data=data+"&"+dataNames[i]+"="+dataValues[i]}
		// make the request
    req.send(data)
	})
}
