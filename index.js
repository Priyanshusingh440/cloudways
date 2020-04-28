function sendJSON(){ 
		
	let username = document.querySelector('#username'); 
	let pwd = document.querySelector('#pwd'); 
	
	var form = document.getElementById("myForm");
	function handleForm(event) { event.preventDefault(); } 
	form.addEventListener('submit', handleForm);
	
	var radios = document.getElementsByName('user_type');

		for (var i = 0, length = radios.length; i < length; i++) {
		if (radios[i].checked) {
			// do whatever you want with the checked radio

		var radio=radios[i].value;

			// only one radio can be logically checked, don't check the rest
			break;
		}
		}
	//	console.log(radio);
	// Creating a XHR object 
	let xhr = new XMLHttpRequest(); 
	 

	// open a connection 
	xhr.open("POST",'API/login.php', true); 

	// Set the request header i.e. which type of content you are sending 
	xhr.setRequestHeader("Content-Type", "application/json"); 

	// Create a state change callback 
	xhr.onload = function (e) { 
		e.preventDefault();
		if (xhr.status === 200) { 

			// Print received data from server 
		//	result.innerHTML = this.responseText; 
		
		//	console.log(this.responseText);
		
			if(this.responseText==1)
			{
					window.location.href="home.php";
			}
			else if(this.responseText==0)
			{
				
				alert("Wrong Details");
			}
		
			
			
		} 
		
	}; 

	// Converting JSON data to string 
	if(radio>0)
		{
			var data = JSON.stringify({"user_type":radio, "username": username.value, "pwd": pwd.value }); 

	//	console.log(data);

	// Sending data with the request 
	xhr.send(data); 
		

		}
	else
	{
		alert("Please Select Login Type");
	}
		
	

} 
