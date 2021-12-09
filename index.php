<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Json</title>
</head>
<body>
    <button id="btnBack"> back </button>
    <div id="main">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Author</th>
                </tr>
            </thead>
            <tbody id="tblPost">
            </tbody>
        </table>
    </div>
    <div id="detail">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>UserID</th>
                </tr>
            </thead>
            <tbody id="tbldetails">
            </tbody>
        </table>
    </div>

    <br/>
    <br/>
    <h3><u>comments</u></h3>
    <div id="main2">
        <table>
            <thead>
                <th>postID</th><br/>

                <th>id</th>
                <th>name</th>
                <th>email</th>
                <th>body</th>

            </thead>
            <tbody id="tblPost2">
            </tbody>
        </table>
    </div>
    <div id="comments">
        <table>
            <thead>
                 <tr>
                  <th>postId</th>
  
                  <th>id</th>
                  <th>name</th>
                  <th>email</th>
                  <th>body</th>
                </tr>
            </thead>
            <tbody id="tblcommets">
            </tbody>
        </table>
    </div>
</body>
<script>
    function LoadPosts() {
        $("#main").show();
        $("#detail").hide();
        $("main2").hide();
        var url = "https://jsonplaceholder.typicode.com/posts"
        $.getJSON(url)
            .done((data) => {
                $.each(data, (k, item) => {
                    
                    var line = "<tr>";
                    line += "<td>" + item.id + "</td>"
                    line += "<td><b>" + item.title + "</b><br/>"
                    line += item.body + "</td>"
                    line += "<td><button onClick='showDetails(" + item.id + ");'>Link</button></td>"
        
                    line += "</tr>";
                    $("#tblPost").append(line);
                });
                $("#main").show();
            })
            .fail((xhr, err, status) => {
            })
    }
    
    
    
    function showDetails(id) {
        $("#main").hide();
        $("#detail").show();
        $("main2").hide();
        var url = "https://jsonplaceholder.typicode.com/posts/" + id
        $.getJSON(url)
            .done((data) => {
                console.log(data);
                var line = "<tr id='details'";
                    line += "><td>" + data.id + "</td>"
                    line += "<td><b>" + data.title + "</b><br/>"
                    line += data.body + "</td>"
                    line += "<td>" + data.userId + "</td>"
                    line += "</tr>";
                    $("#tbldetails").append(line);
             
            })
            .fail((xhr, err, status) => {
            })
    }

    function LoadPosts2() {
        $("#main").hide();
        $("#detail").hide();
        $("#comments").hide();
        $("main2").show();
        var url = "https://jsonplaceholder.typicode.com/comments"
        
        $.getJSON(url)
            .done((data) => {
              $.each(data, (k, item) => {
                    var line = "<tr>";
                    line += "<td>" + item.postId + "</td>"
                    line += "<td><b>" + item.id + "</b><br/>"
                    line += "<td><b>" + item.name+ "</b><br/>"
                    line += "<td><b>" + item.email + "</b><br/>"
                    line +=  item.body+ "</td>"
                

                    line += "</tr>";
                    $("#tblPost2").append(line);
                });
                $("#main").show();
            })
            .fail((xhr, err, status) => {
            })
    }

    function showcomments(id) {
        $("#main").hide();
        $("#commsnts").show();
        var url = "https://jsonplaceholder.typicode.com/posts/"+postId+"/comments"
        $.getJSON(url)
            .done((data) => {
                console.log(data);
                var line = "<tr id='comments'";
                 
                    line += "<td><b>" + data.postId+ "</b><br/>"
                    line += "<td><b>" + data.id + "</b><br/>"
                    line += "<td><b>" + data.name + "</b><br/>"
                    line += "<td><b>" + data.email + "</b><br/>"
                    line += data.body + "</td>"
                    line += "<td>" + data.body + "</td>"
                    line += "</tr>";
                    $("#tblcomments").append(line);
             
            })
            .fail((xhr, err, status) => {
            })

          }

    
    $(() => {
        LoadPosts();
        $("#detail").hide();
        $("#main").show();
        $("#main2").hide();
            
        
        $("#btnBack").click(() => {
        $("#main").show();
        $("#details").remove();
        });
        
        LoadPosts2();
        $("#comments").hide();
        $("#main2").show();
            $("#btnBack").click(() => {
            $("#main").show();
            $("#details").remove();
        });

        

    })
  
</script>
</html>
