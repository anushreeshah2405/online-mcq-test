        var c=600;
        var t;
        timedCount();

       function timedCount()
        {

            var hours = parseInt( c / 3600 ) % 24;
            var minutes = parseInt( c / 60 ) % 60;
            var seconds = c % 60;

            var result = (hours < 10 ? "0" + hours : hours) + ":" + (minutes < 10 ? "0" + minutes : minutes) + ":" + (seconds  < 10 ? "0" + seconds : seconds);
            
            $('#timer').html(result);
            if(c == 0 )
            {
                //setConfirmUnload(false);
                document.forms["form1"].submit();
            }
            c = c - 1;
            t = setTimeout(function()
            {
             timedCount()
            },
            1000);
        }