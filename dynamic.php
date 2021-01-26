<?php
  error_reporting(~E_ALL);
  function sanitize_output($buffer) {
  	$search = array(
  		'/\>[^\S ]+/s',
  		'/[^\S ]+\</s',
  		'/[\s\t]+/s',
      '/<!--[\s\S]*?-->/s'
  	);
  	$replace = ['>', '<', ' ', ''];
  	$buffer = preg_replace($search, $replace, $buffer);
  	return $buffer;
  }
  ob_start("sanitize_output");
?>
<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Dynamic - あんこさーばー</title>
    <link rel="icon" href="img/annko.png" />
    <meta name="description" content="Discordサーバー「あんこさーばー」の公式webページです。雑談やゲーム、作品発表の場など様々な事に是非。" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <?php
      echo "<style>";
      echo "@media only screen and (min-width:500px){";
      $fp = fopen("css/index.css", 'r');
      while (!feof($fp)) {
       echo fgets($fp);
      }
      echo "} @media only screen and (max-width:499px){";
      $fp = fopen("css/mobile.css", 'r');
      while (!feof($fp)) {
       echo fgets($fp);
      }
      echo "}</style>\n";
    ?>
    <!-- <script type="text/javascript" src="//code.typesquare.com/static/5b0e3c4aee6847bda5a036abac1e024a/typesquare.js" charset="utf-8" defer></script> -->
  </head>
  <body>
    <span id="open-menu" onclick="toggleSideBar()">≡</span>
    <header>
      <div id="header-wrap">
        <a href="/"><h1 id="server-name">あんこさーばー</h1></a>
        <span id="sub-title">真面目に不真面目。あんこさーばー</span>
        <div id="search-box">
          <form method="get" action="https://www.google.co.jp/search" target="_blank">
            <input type="text" name="q" size="31" maxlength="255" />
            <input type="submit" name="btng" value="検索" />
            <input type="hidden" name="hl" value="ja" />
            <input type="hidden" name="sitesearch" value="annkoserver.com" />
          </form>
        </div>
      </div>
      <div class="jam"><h3 style="margin-bottom: 0px;">&nbsp;</h3></div>
    </header>
    <main>
      <div style="display:table; width:100%;">
        <div id="side-bar">
          <p><a href="?q=rules">ルール</a></p>
          <p><a href="?q=commands">Botコマンド</a></p>
          <p><a href="?q=serif">運営自己紹介(工事中)</a></p>
          <p><a href="?q=events">イベント予定</a></p>
          <p><a href="https://discord.gg/9DDaqpz2zy">Discordサーバー</a></p>
        </div>
        <div style="display:table-cell;">
          <?php
            $name = $_GET['q'];
            $path = 'forDynamicPHP/' . $name . '.txt';
            if (file_exists($path) && !strpos($name, '..')) {
              $fp = fopen($path, 'r');
              while (!feof($fp)) {
                echo fgets($fp);
              }
            } else {
              $fp = fopen('forDynamicPHP/_404.txt', 'r');
              while (!feof($fp)) {
                echo fgets($fp);
              }
            }
          ?>
        </div>
      </div>
    </main>
    <footer>
      <div id="footer-wrap">
        <h3>あんこさーばー</h3>
        <a href="https://twitter.com/annkoserver">公式（笑）Twitter</a>　
        <a href="https://discord.gg/9DDaqpz2zy">Discordサーバー</a>
        <p>このサイトのコンテンツの無断転載などはご遠慮下さい。リンクはフリーです。</p>
        <div style="text-align:right">&copy; 2020 あんこさん</div>
      </div>
    </footer>
    <script type="text/javascript">
      let sideBarStyle = document.getElementById("side-bar").style;
      function toggleSideBar(){
        [document.body.style.overflow, sideBarStyle.visibility, sideBarStyle.left, sideBarStyle.opacity] =
        sideBarStyle.opacity == "1" ? ["","","",""] : ["hidden", "visible", "0", "1"];
      }
    </script>
  </body>
</html>
