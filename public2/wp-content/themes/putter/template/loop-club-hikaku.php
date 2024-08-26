<?php
    $settings = [
        'id' => $args['post_id'],
        'cnt' => $args['cnt'],
        'pic' => theme_get_picture(get_field('画像', $args['post_id']), 'shop'),
    ];
    // var_dump($settings);
?>
<tr>
    <th>
        <a href="#">
            <figure>
                <figcaption><?= get_the_title($settings['id']) ?></figcaption>
                <img src="<?= $settings['pic'] ?>"/>
            </figure>
        </a>
    </th>
    <td><?= get_field('基本情報_モデル', $settings['id']) ?></td>
    <td><?= get_field('基本情報_価格', $settings['id']) ?></td>
    <td><?= get_field('基本情報_長さ', $settings['id']) ?></td>
    <td><?= get_field('基本情報_重量', $settings['id']) ?></td>
    <td><?= get_field('基本情報_ロフト角', $settings['id']) ?></td>
</tr>
