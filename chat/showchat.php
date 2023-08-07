<?php
include "../koneksi.php";

$query = mysqli_query($koneksi, "select * from user_agent x inner join tb_user y on y.id_user = x.id_user 
inner join dompet_user z on z.id_user = y.id_user where name_user_agent = '".$_SERVER['HTTP_USER_AGENT']."' group by x.id_user asc");
$username = mysqli_fetch_array($query);

  $querydata = mysqli_query($koneksi, "select * from tb_user x inner join chatgroup y on x.id_user = y.id_user group by id_chat desc");
  while($uses = mysqli_fetch_array($querydata)) {
    if ($uses['id_user'] != $username['id_user']) { ?>

  <!-- Message. Default to the left -->
  <div class="direct-chat-msg">
    <div class="direct-chat-infos clearfix">
      <span class="direct-chat-name float-left"><?= $uses['nama_lengkap']; ?></span>
      <span class="direct-chat-timestamp float-right"><?= $uses['tgl_chat']; ?></span>
    </div>
    <!-- /.direct-chat-infos -->
    <img class="direct-chat-img" src="dist/img/user1-128x128.jpg" alt="Message User Image">
    <!-- /.direct-chat-img -->
    <div class="direct-chat-text">
      <?= $uses['isi_chat']; ?>
    </div>
    <!-- /.direct-chat-text -->
  </div>
  <!-- /.direct-chat-msg -->

    <?php }else if($uses['id_user'] == $username['id_user']){ ?>

  <!-- Message to the right -->
  <div class="direct-chat-msg right msg">
    <div class="direct-chat-infos clearfix">
      <span class="direct-chat-name float-right"><?= $uses['nama_lengkap']; ?></span>
      <span class="direct-chat-timestamp float-left"><?= $uses['tgl_chat']; ?></span>
    </div>
    <!-- /.direct-chat-infos -->
    <img class="direct-chat-img" src="dist/img/user3-128x128.jpg" alt="Message User Image">
    <!-- /.direct-chat-img -->
    <div class="direct-chat-text">
      <?= $uses['isi_chat']; ?>
    </div>
    <!-- /.direct-chat-text -->
  </div>
  <!-- /.direct-chat-msg -->

    <?php }
  }
?>