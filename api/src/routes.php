<?php

use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Http\UploadedFile;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function getConnect(){
    require_once 'include/dbHandler.php';
    $db = new dbHandler();
    return $db;
}

// Routes
$app->get('/[{name}]', function (Request $request, Response $response, array $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");

    // Render index view
    return $this->renderer->render($response, 'index.phtml', $args);
});

//login
$app->post("/login/", function (Request $request, Response $response){

    $login = $request->getParsedBody();

    $sql = "SELECT * FROM tb_member WHERE id_member=:id_member AND password=:password AND status=1";
    $stmt = $this->db->prepare($sql);

    $data = [
        ":id_member" => $login["id_member"],
        ":password" => $login["password"]
    ];
    $stmt->execute($data);
    $result = $stmt->fetchAll();

    if($result)
       return $response->withJson(["status" => "success", "data" => "1"], 200);
    
    return $response->withJson(["status" => "failed", "data" => "0"], 200);
});

//register
$app->post("/register/", function (Request $request, Response $response){

    $profil = $request->getParsedBody();

    $sql = "INSERT INTO tb_member (id_member, nama_member, detail_ruang, id_ruang, no_hp, email, alamat, password, status) VALUE (:id_member, :nama_member, :detail_ruang, :id_ruang, :no_hp, :email, :alamat, :password, :status)";
    $stmt = $this->db->prepare($sql);

    $data = [
        ":id_member" => $profil["id_member"],
        ":nama_member" => $profil["nama_member"],
        ":detail_ruang" => $profil["detail_ruang"],
        ":id_ruang" => $profil["id_ruang"],
        ":no_hp" => $profil["no_hp"],
        ":email" => $profil["email"],
        ":alamat" => $profil["alamat"],
        ":password" => $profil["password"],
        ":status" => $profil["status"]
    ];

    if($stmt->execute($data))
       return $response->withJson(["status" => "success", "data" => "1"], 200);
    
    return $response->withJson(["status" => "failed", "data" => "0"], 200);
});

//register
$app->get("/sendpassword/{id_member}/{email}", function (Request $request, Response $response, $args){
    $id_member = $args["id_member"];
    $email = $args["email"];
    $sql = "SELECT * FROM tb_member WHERE id_member=:id_member";
    $stmt = $this->db->prepare($sql);
    $stmt->execute([":id_member" => $id_member]);
    $result = $stmt->fetch();

    $param = "secret-password-reset-code";

    $mail = new PHPMailer;

    $mail->setFrom('nikkoeka04@gmail.com', 'I Love Campus');
    $mail->addAddress($email);
    $mail->addReplyTo('no-reply@badger-dating.com', 'I Love Campus');

    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = 'Instructions for resetting the password for your account with BadgerDating.com';
    $mail->Body    = "
        <p>Hi,</p>
        <p>            
        Thanks for choosing BadgerDating.com!  We have received a request for a password reset on the account associated with this email address.
        </p>
        <p>
        To confirm and reset your password, please click <a href=\"http://badger-dating.com/resetpassword/$id/$param\">here</a>.  If you did not initiate this request,
        please disregard this message.
        </p>
        <p>
        If you have any questions about this email, you may contact us at support@badger-dating.com.
        </p>
        <p>
        With regards,
        <br>
        The BadgerDating.com Team
        </p>";

    if(!$mail->send()) {
        $app->flash("error", "We're having trouble with our mail servers at the moment.  Please try again later, or contact us directly by phone.");
        error_log('Mailer Error: ' . $mail->errorMessage());
        $app->halt(500);
    }
});

//menampilkan profile
$app->get("/profile/{id_member}", function (Request $request, Response $response, $args){
    $id_member = $args["id_member"];
    $sql = "SELECT * FROM tb_member, tb_ruang WHERE tb_member.id_ruang=tb_ruang.id_ruang AND id_member=:id_member";
    $stmt = $this->db->prepare($sql);
    $stmt->execute([":id_member" => $id_member]);
    $result = $stmt->fetch();
    return $response->withJson(["status" => "success", "data" => $result], 200);
});

//edit profile
$app->post("/profile/edit/", function (Request $request, Response $response){

    $profil = $request->getParsedBody();

    $sql = "UPDATE tb_member SET nama_member=:nama_member, detail_ruang=:detail_ruang, id_ruang=:id_ruang, no_hp=:no_hp, email=:email, alamat=:alamat WHERE id_member=:id_member";
    $stmt = $this->db->prepare($sql);

    $data = [
        ":id_member" => $profil["id_member"],
        ":nama_member" => $profil["nama_member"],
        ":detail_ruang" => $profil["detail_ruang"],
        ":id_ruang" => $profil["id_ruang"],
        ":no_hp" => $profil["no_hp"],
        ":email" => $profil["email"],
        ":alamat" => $profil["alamat"]
    ];

    if($stmt->execute($data))
       return $response->withJson(["status" => "success", "data" => "1"], 200);
    
    return $response->withJson(["status" => "failed", "data" => "0"], 200);
});

//edit password
$app->post("/profile/password/", function (Request $request, Response $response){

    $profil = $request->getParsedBody();

    $sql = "UPDATE tb_member SET password=:password WHERE id_member=:id_member";
    $stmt = $this->db->prepare($sql);

    $data = [
        ":id_member" => $profil["id_member"],
        ":password" => $profil["password"]
    ];

    if($stmt->execute($data))
       return $response->withJson(["status" => "success", "data" => "1"], 200);
    
    return $response->withJson(["status" => "failed", "data" => "0"], 200);
});

//menambahkan lokasi awal
$app->post("/lokasi/awal", function (Request $request, Response $response){

    $profil = $request->getParsedBody();

    $sql = "INSERT INTO tb_maps (id_member, latitude, longitude) VALUE (:id_member, :latitude, :longitude)";
    $stmt = $this->db->prepare($sql);

    $data = [
        ":id_member" => $profil["id_member"],
        ":latitude" => $profil["latitude"],
        ":longitude" => $profil["longitude"]
    ];

    if($stmt->execute($data))
       return $response->withJson(["status" => "success", "data" => "1"], 200);
    
    return $response->withJson(["status" => "failed", "data" => "0"], 200);
});

//mengupdate lokasi
$app->post("/lokasi/update", function (Request $request, Response $response){

    $profil = $request->getParsedBody();

    $sql = "UPDATE tb_maps SET latitude=:latitude, longitude=:longitude WHERE id_member=:id_member";
    $stmt = $this->db->prepare($sql);

    $data = [
        ":id_member" => $profil["id_member"],
        ":latitude" => $profil["latitude"],
        ":longitude" => $profil["longitude"]
    ];

    if($stmt->execute($data))
       return $response->withJson(["status" => "success", "data" => "1"], 200);
    
    return $response->withJson(["status" => "failed", "data" => "0"], 200);
});

//menghapus lokasi user ketika logout
$app->post("/lokasi/clear", function (Request $request, Response $response){

    $profil = $request->getParsedBody();

    $sql = "DELETE FROM tb_maps WHERE id_member=:id_member";
    $stmt = $this->db->prepare($sql);

    $data = [
        ":id_member" => $profil["id_member"]
    ];

    if($stmt->execute($data))
       return $response->withJson(["status" => "success", "data" => "1"], 200);
    
    return $response->withJson(["status" => "failed", "data" => "0"], 200);
});

//menampilkan lokasi semua member
$app->get("/lokasi/", function (Request $request, Response $response){
    $sql = "SELECT * FROM tb_maps, tb_member, tb_ruang WHERE tb_member.id_ruang=tb_ruang.id_ruang AND tb_maps.id_member=tb_member.id_member";
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();
    return $response->withJson(["status" => "success", "data" => $result], 200);
});

//menampilkan data semua member
$app->get("/member/{status}", function (Request $request, Response $response, $args){
    $status = $args["status"];
    $sql = "SELECT * FROM tb_member, tb_ruang WHERE tb_member.id_ruang=tb_ruang.id_ruang AND status=:status";
    $stmt = $this->db->prepare($sql);
    $stmt->execute([":status" => $status]);
    $result = $stmt->fetchAll();
    return $response->withJson(["status" => "success", "data" => $result], 200);
});

//searching member
//cara manggilnya /search/?keyword=xxx
$app->get("/member/search/", function (Request $request, Response $response, $args){
    $keyword = $request->getQueryParam("keyword");
    $status = $request->getQueryParam("status");
    $sql = "SELECT * FROM tb_member WHERE status='$status' AND id_member LIKE '%$keyword%'";
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();
    return $response->withJson(["status" => "success", "data" => $result], 200);
});

//menampilkan data extras
$app->get("/extras/", function (Request $request, Response $response){
    $sql = "SELECT * FROM tb_extras";
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch();
    return $response->withJson(["status" => "success", "data" => $result], 200);
});

//menampilkan tipe ruang
$app->get("/ruang/", function (Request $request, Response $response){
    $sql = "SELECT * FROM tb_ruang";
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();
    return $response->withJson(["status" => "success", "data" => $result], 200);
});