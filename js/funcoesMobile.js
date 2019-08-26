// Pega as Horas e Minutos RealTime

function pegarHoras() {

	var msghora = document.getElementById('hora');
	var data = new Date();
	var hora = data.getHours();
	var minuto = data.getMinutes();

	if (hora<10) {
		hora = '0'+hora
	}
	if (minuto<10) {
		minuto = '0'+minuto
	}

	if (hora>=0 && hora<=12) {
		msghora.innerHTML = `<strong>Bom Dia!</strong> São <strong>${hora}:${minuto}</strong> horas!`
	} else if (hora>12 && hora<18) {
		msghora.innerHTML = `Boa Tarde! São ${hora}:${minuto} horas!`
	} else if (hora>=18 && hora<=23.99) {
		msghora.innerHTML = `Boa Noite! São ${hora}:${minuto} horas!`
	} else {
		msghora.innerHTML = `Hora inválida!`
	}

	setTimeout(pegarHoras,10000)
}


// Cadastro -----------------

function insert(num){
	document.form.textview.value = document.form.textview.value+num
}
function limpar(){
	document.form.textview.value = ""
}

