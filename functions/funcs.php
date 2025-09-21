<?php
function getPageAbout(PDO $pdo) {
    // Using query() directly; ID is hardcoded as 1
    $page = $pdo->query("SELECT about_title, about_content, about_banner FROM tbl_page WHERE id = 1")
                ->fetch(PDO::FETCH_ASSOC);

    return $page ?: [
        'about_title'   => '',
        'about_content' => '',
        'about_banner'  => ''
    ];
}
