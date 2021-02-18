$(document).ready(function(){
    getallItem();
})

$('#search').on('click', function (e) {
    e.preventDefault();
    getidItem();
});


$('#save').on('click', function (e) {
    e.preventDefault();
    $(this).text() == 'Submit' ? simpan() : ubah();    
});


$('#input-movie').keypress(function(e){
    var code = e.keyCode
    if (code == 13) {
        e.preventDefault(); // untuk proses enter di php tidak berfungsi
        delete $.ajaxSettings.headers["X-CSRF-TOKEN"] // karena untuk post ajax local header di isi
        showMovies('#input-movie'); 
        $.ajaxSettings.headers["X-CSRF-TOKEN"] = $('meta[name="csrf-token"]').attr('content');  //mengembalikan header yg di hapus          
    }
})

$('#click-movie').on('click', function(e){
        e.preventDefault(); // untuk proses enter di php tidak berfungsi
        delete $.ajaxSettings.headers["X-CSRF-TOKEN"] // karena untuk post ajax local header di isi
        showMovies('#input-movie');
        $.ajaxSettings.headers["X-CSRF-TOKEN"] = $('meta[name="csrf-token"]').attr('content');    //mengembalikan header yg di hapus       
})

$('#movie-list').on('click','.see-detail', function(e){
     e.preventDefault(); // untuk proses enter di php tidak berfungsi
     delete $.ajaxSettings.headers["X-CSRF-TOKEN"] // karena untuk post ajax local header di isi
     showMoviesDetail($(this).data('id'));
     $.ajaxSettings.headers["X-CSRF-TOKEN"] = $('meta[name="csrf-token"]').attr('content');  //mengembalikan header yg di hapus
})

$('#input-video').keypress(function(e){
    var code = e.keyCode
    if (code == 13) {
        e.preventDefault(); // untuk proses enter di php tidak berfungsi
        delete $.ajaxSettings.headers["X-CSRF-TOKEN"] // karena untuk post ajax local header di isi
        showVideo('#input-video'); 
        $.ajaxSettings.headers["X-CSRF-TOKEN"] = $('meta[name="csrf-token"]').attr('content');  //mengembalikan header yg di hapus          
    }
})


function fclear() {
    $('#hasil').empty();
    $('#newplu').prop('readonly', false)
    $('#newplu').val('');
    $('#newdescription').val('');
    $('#newprice').val('');
    $('#newbrand').val('');
    $('#save').text('Submit');
}

function simpan (){
    $.ajax({
        type: "POST",
        url: "api/save",
        data: {
           "plu" : $('#newplu').val(),
           "long_description" : $('#newdescription').val(),
           "brand" : $('#newbrand').val(),
           "price" : $('#newprice').val(),
        },
        success: function (response) {
            getallItem();
        },
        failure: function (response) {
            alert(response.responseText);
            alert("Failure");
        },
        error: function (response) {
            alert(response);
            alert("Error");
        }
});
};

function ubah (){
    $.ajax({
        type: "POST",
        url: "api/update",
        data: {
           "plu" : $('#newplu').val(),
           "long_description" : $('#newdescription').val(),
           "brand" : $('#newbrand').val(),
           "price" : $('#newprice').val(),
        },
        success: function (response) {
            getallItem();
        },
        failure: function (response) {
            alert(response.responseText);
            alert("Failure");
        },
        error: function (response) {
            alert(response);
            alert("Error");
        }
});
};

//untuk mengambil value tiap record
$("#hasil").on('click','a',function(e) {
    e.preventDefault();

if ($(this).attr('id').slice(-1) == 'e' ) {
    $price = parseFloat($(this).closest('tr').find('td:eq(2)').text()).toLocaleString(window.document.documentElement.lang)
    $('#newplu').val($(this).attr('id').substring(0, 12));
    $('#newdescription').val($(this).closest('tr').find('td:eq(1)').text());
    $('#newprice').val($price);
    $('#newbrand').val($(this).closest('tr').find('td:eq(4)').text());
    //.prop = non-document (readonly, disable) stuff  dan .attr" = document stuff (a,p,td)
    $('#newplu').prop('readonly', true)
    //beberapa cara ambil value di componen lain
    // alert($(this).closest('tr').find('td:first').text());
    // alert($(this).closest('tr').find('td:first').next().text());
    // alert($(this).closest('tr').find('td:eq(1)').text());

    //convert ke format number string
    // parseFloat("1234567.891").toLocaleString(window.document.documentElement.lang);

    $('#save').text('Update');
}
else {
$.ajax({
    url:'api/delete/' + $(this).attr('id').substring(0, 12),
    type: 'GET',
    success:function(){
        getallItem();
    }

})
}
   
    
});

//untuk merubah ke format number
$('#newprice').on('keyup',function(){
    var input = $(this).val();
    var input = input.replace(/[\D\s\._\-]+/g, "");
    //kondisi ternary <kodisi> ? "benar" : "salah"
    input = input ? parseInt( input, 10 ) : 0;
    //isi value juga bisa diisi fungsi
    $(this).val( function() {
        return ( input === 0 ) ? "" : input.toLocaleString( "en-US" );
    } );
});


function showMovies (list) {
        $.ajax({
            url:'http://www.omdbapi.com',
            type:'get',
            dataType:'json',
            data:{
                'apikey':'73c25a65',
                's' : $(list).val()
            },
            success:function(data){
                // console.log(data);
                if(data.Response == "True"){
                    var datax = data.Search;
                    $('#movie-list').empty();
                 $.each(datax, function(i, data){
                     $('#movie-list').append(`<div class = "col-md-3">
                     <div class="card bg-light mb-3">
                     <div class="card-header">` + data.Title + `</div>
                     <div class="card-body">
                     <img src=`+ data.Poster +` class="card-img-top mb-2">
                         <h6 class="card-title">` + data.Year + `</h6>
                         <a data-id = `+ data.imdbID +` href="" class="btn btn-primary btn-sm see-detail"  data-toggle="modal" data-target="#exampleModalCenter">See Detail</a>
                     </div>
                     </div>
                     </div>`)
                 })
                }
                else {
                    $('#movie-list').html(`<div class="col">
                     <h1 class = "text-center">` + data.Error + `</h1> 
                     </div>`)
                }
            }
        })
}

function showMoviesDetail (id) {
        $.ajax({
            url:'http://www.omdbapi.com',
            type:'get',
            dataType:'json',
            data:{
                'apikey':'73c25a65',
                'i' : id
            },
            success:function(data){
                
                if(data.Response == "True"){
                     $('.modal-body').html(`
                     <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-4">
                                <img src=`+ data.Poster +` class="img-fluid">
                            </div>
                            <div class="col-md-8">
                                <ul class="list-group">
                                    <li class="list-group-item"><h3>`+ data.Title +`</h3></li>
                                    <li class="list-group-item">`+ data.Genre +`</li>
                                    <li class="list-group-item">`+ data.Country +`</li>
                                    <li class="list-group-item">`+ data.imdbRating +`</li>
                                    <li class="list-group-item">`+ data.Plot +`</li>
                                </ul>
                            </div>
                        </div>
                     </div>
                     `)                
                }
                else {
                    $('.modal-body').html(`<div class="col">
                     <h1 class = "text-center">` + data.Error + `</h1> 
                     </div>`)
                }
            }
        })
}

function getallItem() {
    $.ajax({
        url:'api/all',
        type:'GET',
        contentType: "application/json; charset=utf-8",
        dataType: "json",
        success:function(response){                  	
            len = response.length;	
            var line = 0
            if(len > 0){
                fclear()
                $('#hasil').empty();
                for(var i=0; i<len; i++){ 
                    line++
                    $price = parseFloat(response[i].price).toLocaleString(window.document.documentElement.lang);
                    $('#hasil').append(`
                    <tr>
                    <th scope="row">`+ line +`</th>
                    <td>`+ response[i].plu +`</td>
                    <td>`+ response[i].long_description +`</td>
                    <td>`+ $price +`</td>
                    <td>`+ response[i].burui +`</td>
                    <td>`+ response[i].brand +`</td>
                    <td>
                    <div class="dropdown">
                        <button class="btn btn-default border btn-sm " type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-list" aria-hidden="true"></i>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a id="`+ response[i].plu +`e" class="dropdown-item" href="#"><i class="fa fa-edit mr-2"></i>Edit</a>
                            <a id="`+ response[i].plu +`d" class="dropdown-item" href="#"><i class="fa fa-trash mr-2"></i>Delete</a>
                        </div>
                    </div>
                    </td>
                    </tr>`)
                }
            }	                 
        },
        failure: function (response) {
            alert(response.responseText);
            alert("Failure");
        },
        error: function (response) {
            alert(response);
            alert("Error");
        }
    })
}

function getidItem(){
    $.ajax({
        type: "GET",
        url: "api/" + $('#splu').val(),
        contentType: "application/json; charset=utf-8",
        dataType: "json",
        success: function (response) {
            len = response.length;	
            var line = 0
            if(len > 0){
                fclear();
                for(var i=0; i<len; i++){ 
                    line++
                    $price = parseFloat(response[i].price).toLocaleString(window.document.documentElement.lang);
                    $('#hasil').append(`
                    <tr>
                    <th scope="row">`+ line +`</th>
                    <td>`+ response[i].plu +`</td>
                    <td>`+ response[i].long_description +`</td>
                    <td>`+ $price +`</td>
                    <td>`+ response[i].burui +`</td>
                    <td>`+ response[i].brand +`</td>
                    <td>
                    <div class="dropdown">
                        <button class="btn btn-default border btn-sm " type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-list" aria-hidden="true"></i>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a id="`+ response[i].plu +`e" class="dropdown-item" href="#"><i class="fa fa-edit mr-2"></i>Edit</a>
                            <a id="`+ response[i].plu +`d" class="dropdown-item" href="#"><i class="fa fa-trash mr-2"></i>Delete</a>
                        </div>
                    </div>
                    </td>
                    </tr>`)
                }
                $('#splu').val('');
                $('#splu').focus();
            }	  

        },
        failure: function (response) {
            alert(response.responseText);
            alert("Failure");
        },
        error: function (response) {
            alert(response);
            alert("Error");
        }
    });
}

function showVideo (list) {
    $.ajax({
        url:'https://youtube.googleapis.com/youtube/v3/search',
        type:'get',
        dataType:'json',
        data:{
            'key':'AIzaSyBhPbgJjS9-01eLIxY3H55HgLCP5kdE6EY',
            'q' : $(list).val(),
            'part' : 'snippet'
        },
        success:function(data){
            // console.log(data);
            if(data.pageInfo.totalResults >> 0){
                var datax = data.items;
                $('#video-list').empty();
             $.each(datax, function(i, datas){
                 $('#video-list').append(`<div class="card mb-3 ml-3">
                <div class="row no-gutters">
                    <div class="bs-example col-sm-4">
                    <div class="embed-responsive embed-responsive-4by3">
                        <iframe class="embed-responsive-item" src=`+ `https://www.youtube.com/embed/` + datas.id.videoId +` allowfullscreen></iframe>
                    </div>
                    </div>
                    <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">` + datas.snippet.title + `</h5>
                        <p class="card-text">` + datas.snippet.description + `</p>
                        <p class="card-text"><small class="text-muted">` + datas.snippet.publishedAt + `</small></p>
                        
                    </div>
                    </div>
                </div>
                </div>`)
             })
            }
            else {
                $('#video-list').html(`<div class="col">
                 <h1 class = "text-center">` + data.Error + `</h1> 
                 </div>`)
            }
        }
    })
}