<?php
    $settings = [
        'id' => $args['shop_id'],
        'cnt' => $args['cnt'],
        'pic' => theme_get_picture(get_field('画像', $args['shop_id']), 'shop'),
        '設備インドア' => get_field('設備インドア', $args['shop_id']),
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
    <td><?= get_field('基本情報_営業時間', $settings['id']) ?></td>
    <td><?= get_field('基本情報_駐車場', $settings['id']) ?></td>
    <td><?= get_field('基本情報_料金', $settings['id']) ?></td>
    <td><?= get_field('基本情報_打席数', $settings['id']) ?></td>
    <td><?= get_field('基本情報_シミュレーター', $settings['id']) ?></td>
</tr>
