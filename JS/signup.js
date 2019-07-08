 <script type="text/javascript">
            function validate() 
            {
            var userText=document.getElementById('userText');
            var passText=document.getElementById('passText');
            var mailText=document.getElementById('mailText');
            var numText=document.getElementById('numText');
            var userError=document.getElementById('userError');
            var passError=document.getElementById('passError');
            var mailError=document.getElementById('mailError');
            var numError=document.getElementById('numError');


            userError.style.display='none';
            passError.style.display='none';
            mailError.style.display='none';
            numError.style.display='none';

            var username=userText.value;
            var password=passText.value;
            var email=mailText.value;
            var number=numText.value;


            if (username=="") 
            {
                userError.style.display='block';
                return false;
            }


            if (password=="") 
            {
                passError.style.display='block';
                return false;

            }
                if (email=="") 
            {
                mailError.style.display='block';
                return false;
            }


            if (number=="") 
            {
                numError.style.display='block';
                return false;

            }
            return true;
        }
        </script>