<!-- Robert Kamenicky C00231987-->
<!-- Tutor: Catherine Moloney-->


	function showalert(type, message)
		{	//document.getElementById(type).innerHTML = '';
			document.getElementById(type).style.display = "block";	
			
			var innermyspan = document.getElementById(type).innerHTML;
			document.getElementById(type).innerHTML = message+innermyspan;			
	
		setTimeout(function() 	{document.getElementById(type).style.display = "none";},4000);	
					
		}
		
	function hidealert(type)
		{	
			setTimeout(function() {document.getElementById(type).style.display = "none";},1);	
			
		}
		
