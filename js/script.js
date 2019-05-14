const eddy = document.getElementById('eddy');

// fetch('app.json')
// .then(res => JSON.parse(res))
// .then(data => {
// 	console.log(data);
// });

const http = new XMLHttpRequest();
http.open('GET','js/app.json',true);
http.onload = function(){
	if(this.status === 200){
		console.log(textResponse);
	}
}

http.send();



setInterval(() =>{
	const time = new Date().toLocaleTimeString();
	eddy.innerText = time;
},1000);
// eddy.innerText = time;