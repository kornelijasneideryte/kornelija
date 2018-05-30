function modeliai($markesid) {
    //e.preventDefault();
    var markesid = document.getElementById("sel1").value;
    //if it's all right we proceed
    $.ajax( {
        type: 'post',
        //our baseurl variable in action will call a method in our default controller
        url: 'modelis',
        data: { markesid: markesid},
        dataType: "json",
        success: function ( result )
        {
        select = document.getElementById("sel2");
        markesname = document.getElementById("markesid");

        //console.info(result);
        /*
        var selectobject=document.getElementById("sel2");
        console.info(selectobject.options.length);
        for (var i=0; i<selectobject.options.length; i++){
         selectobject.remove(i);
        }*/
        document.getElementById("sel2").options.length = 0;

        for (var i = 0; i<=result.modeliai.length; i++){
            var opt = document.createElement('option');
            opt.value = result.modeliai[i].modelis;
            opt.innerHTML = result.modeliai[i].modelis;
            opt.id = result.modeliai[i].id;
            select.appendChild(opt);
        }
        
        },
        error: function ( result )
        {
            console.info(result);
        }
    } );
}; 