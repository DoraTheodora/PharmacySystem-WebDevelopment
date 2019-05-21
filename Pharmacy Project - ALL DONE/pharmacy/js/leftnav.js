<!-- Robert Kamenicky C00231987-->
<!-- Tutor: Catherine Moloney-->

 function togNav() 
        {		
            if (document.getElementById("mySidenav").style.width == "40px") 
            {	
                document.getElementById("mySidenav").style.width = "250px";
                document.getElementById("main").style.marginLeft = "250px";
				document.getElementById("longnav").style.display = "block";
				document.getElementById("shortnav").style.display = "none";	
				document.getElementById("logocontainer").style.display = "block";
				
            } else {
				
				document.getElementById("mySidenav").style.width = "40px";
                document.getElementById("main").style.marginLeft = "40px";
				document.getElementById("longnav").style.display = "none";
				document.getElementById("shortnav").style.display = "block";	
				document.getElementById("logocontainer").style.display = "none";
				
            }
        }