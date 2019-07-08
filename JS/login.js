<script type="text/javascript">
            function validate() 
            {
            var userText=document.getElementById('userText');
            var passText=document.getElementById('passText');
            var userError=document.getElementById('userError');
            var passError=document.getElementById('passError');
            userError.style.display='none';
            passError.style.display='none';

            var username=userText.value;
            var password=passText.value;
            if (username=="") 
            {
                userError.style.display='block';
                return false;
            }
            var reg =/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
             if (reg.test(username)==false)
             {
                alert('Invalid Email Address');
                return false;
             }


            if (password=="") 
            {
                passError.style.display='block';
                passError.innerHTML="Password must not be empty";
                return false;

            }
              

             if (password.length<8) 
            {
                passError.style.display='block';
                passError.innerHTML="Password must not be less than 8 characters";
                return false;

            }
            return true;
        }
        </script>