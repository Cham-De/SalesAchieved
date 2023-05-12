$(document).ready(function(){

    
    $('#search').keyup(function(){

        var searchVal = $('#search').val();
        console.log(searchVal);

        if(searchVal != ''){
            $.ajax({

                url:'./search_bar.php',
                method: 'POST',
                data: {searchVal:searchVal},
                success: function(data){
                    console.log(data);
                    $('#search_content').html(data);
                }
            })
        }
        else{
            $('#search_content').html('');
            
        }

        $(document).on('click', 'a', function(){
            $('#search').val($(this).text());
            $('#search_content').html('');
        })
    })

    $(document).on('click', '#btnSearch', function(){

        var searchVal2 = $('#search').val();
        // console.log("workibg :",searchVal );
        $.ajax({

            url:'./fetch.php',
            method: 'POST',
            data: {searchVal2:searchVal2,
                identifier: 'custom_filter'},
            success: function(data){
                console.log(data);
                $('.dynamic_content').html(data);
            }
        })
    })



})

    