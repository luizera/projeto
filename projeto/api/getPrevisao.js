window.addEventListener('load', async ()=>{
	getLocation()
})
	function getLocation(){

		
        navigator.geolocation.getCurrentPosition(function(coordenadas){
        	getPrevisao(coordenadas.coords.latitude, coordenadas.coords.longitude);
        });
	}
	async function getPrevisao(lat, lon){
		let x = document.querySelector("div.button:last-child")
		let y = document.createElement("div")
		let desc = document.createElement("div")
		let temp = document.createElement("div")
		desc.style.color = "black"
		temp.style.color = "black"
		y.appendChild(desc)
		y.appendChild(temp)
		let request = await fetch('http://api.openweathermap.org/data/2.5/weather?lat='+lat+'&lon='+lon+'&units=metric&lang=pt&APPID=c144ba4eaa5f0aebc01c661169701dc7')
		let previsao = await request.json()
		desc.innerText ="Descrição: " + previsao['weather']['0']['description']
		temp.innerText = "Temperatura: " + previsao['main']['temp'] + "°"
		let cidade = previsao['name']
		console.log(previsao)
		x.addEventListener('click', async ()=>{
			swal({
				title:cidade,
				content: y,
				buttons: {
					cancel: {
						text: "Sair",
						visible: true,
						closeModal: true
					}
				}
			})
		})
	}