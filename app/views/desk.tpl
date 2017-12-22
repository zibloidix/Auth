

<script type="text/javascript">
    function logout(){
        document.cookie = "uid=; expires=Thu, 01 Jan 1970 00:00:01 GMT;";
        document.cookie = "sid=; expires=Thu, 01 Jan 1970 00:00:01 GMT;";
        window.location.href="/admindesk/";
        console.log(document.cookie);
    }
</script>
<h1>Hello - Admin Desk</h1>
<a href="#!" onclick="logout()">Logout</a>
