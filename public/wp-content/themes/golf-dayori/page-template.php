<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <div class="l-container">
        <div class="u-template">
            <div class="u-gap">
                <p>.c-heading</p>
                <div class="c-heading">
                    <p class="c-heading__sub">最新記事</p>
                    <h2 class="c-heading__main">Latest News</h2>
                </div>
                <p>.c-heading.c-heading--center</p>
                <div class="c-heading c-heading--center">
                    <p class="c-heading__sub">最新記事</p>
                    <h2 class="c-heading__main">Latest News</h2>
                </div>
                <p>.c-heading.c-heading--center.c-heading--sub</p>
                <div class="c-heading c-heading--center c-heading--sub">
                    <p class="c-heading__sub">最新記事</p>
                    <h2 class="c-heading__main">Latest News</h2>
                </div>
                <p>.c-heading.c-heading--right.c-heading--sub</p>
                <div class="c-heading c-heading--right c-heading--sub">
                    <p class="c-heading__sub">最新記事</p>
                    <h2 class="c-heading__main">Latest News</h2>
                </div>
                <p>.c-heading-bar</p>
                <h2 class="c-heading-bar">2. 店舗比較一覧</h2>
                <p>.c-heading-line</p>
                <h2 class="c-heading-line">1.1 SWING24/7新宿店</h2>
            </div>
        </div>
        <div class="u-template">
            <div class="u-gap">
                <p>.c-paragraph</p>
                <p class="c-paragraph">ゴルフで最も重要なショットの一つであるドライバーショット。ゴルフ初心者にとっては特に、正確な飛距離や方向性を得るのが難しいクラブです。しかし、平均飛距離を理解し、それに基づいた目標設定を行うことで、練習の方向性が明確になり、プレーの上達につながります。ここでは、ドライバーの平均飛距離と、効果的な目標設定法について解説します。</p>
            </div>
        </div>
        <div class="u-template">
            <div class="u-gap">
                <p>.c-btn-square</p><a class="c-btn-square" href="#"> もっと見る</a>
                <p>.c-btn-square.c-btn-square--sub</p><a class="c-btn-square c-btn-square--sub" href="#"> もっと見る</a>
                <p>.c-btn-square.c-btn-square--sub</p><a class="c-btn-square c-btn-square--sub" href="#"> もっと見る</a>
            </div>
        </div>
        <div class="u-template">
            <p>.c-card-btn</p>
            <div class="u-gap" style="flex-direction: row; gap: 30px;">
                <div class="c-card-btn"><a class="c-card-btn__link" href="#">
                        <figure class="c-card-btn__pic"><img src="<?= get_stylesheet_directory_uri() ?>/assets/img/600x180.webp"/></figure>
                        <div class="c-card-btn__wrap"><span class="c-card-btn__title">福岡ゴルフスクール</span><i class="c-card-btn__ico"><svg width="20" height="20"><use href="#ico-arrow-right"></use></svg></i></div></a></div>
                <div class="c-card-btn"><a class="c-card-btn__link" href="#">
                        <figure class="c-card-btn__pic"><img src="<?= get_stylesheet_directory_uri() ?>/assets/img/600x180.webp"/></figure>
                        <div class="c-card-btn__wrap"><span class="c-card-btn__title">福岡ゴルフスクール</span><i class="c-card-btn__ico"><svg width="20" height="20"><use href="#ico-arrow-right"></use></svg></i></div></a></div>
                <div class="c-card-btn"><a class="c-card-btn__link" href="#">
                        <figure class="c-card-btn__pic"><img src="<?= get_stylesheet_directory_uri() ?>/assets/img/600x180.webp"/></figure>
                        <div class="c-card-btn__wrap"><span class="c-card-btn__title">福岡ゴルフスクール</span><i class="c-card-btn__ico"><svg width="20" height="20"><use href="#ico-arrow-right"></use></svg></i></div></a></div>
            </div>
            <p>.c-card-article</p>
            <div class="u-gap" style="flex-direction: row; gap: 30px;">
                <div class="c-card-article"><a class="c-card-article__link" href="#">
                        <figure class="c-card-article__pic"><img src="<?= get_stylesheet_directory_uri() ?>/assets/img/600x450.webp" alt=""/></figure>
                        <div class="c-card-article__meta"><span class="c-card-article__date">2024年5月1日</span>
                            <h3 class="c-card-article__title">親譲りの無鉄砲で小供の時から損ばかりしている</h3>
                        </div></a></div>
                <div class="c-card-article"><a class="c-card-article__link" href="#">
                        <figure class="c-card-article__pic"><img src="<?= get_stylesheet_directory_uri() ?>/assets/img/600x450.webp" alt=""/></figure>
                        <div class="c-card-article__meta"><span class="c-card-article__date">2024年5月1日</span>
                            <h3 class="c-card-article__title">親譲りの無鉄砲で小供の時から損ばかりしている</h3>
                        </div></a></div>
                <div class="c-card-article"><a class="c-card-article__link" href="#">
                        <figure class="c-card-article__pic"><img src="<?= get_stylesheet_directory_uri() ?>/assets/img/600x450.webp" alt=""/></figure>
                        <div class="c-card-article__meta"><span class="c-card-article__date">2024年5月1日</span>
                            <h3 class="c-card-article__title">親譲りの無鉄砲で小供の時から損ばかりしている</h3>
                        </div></a></div>
            </div>
        </div>
        <div class="u-template">
            <p>.cm-main-pagination</p>
            <div class="cm-main-pagination">
                <ul class="cm-main-pagination__list">
                    <li class="cm-main-pagination__ctrl"><a href="#"><svg width="20" height="20"><use href="#ico-arrow-left"></use></svg></a></li>
                    <li class="cm-main-pagination__no is-current"><span>1</span></li>
                    <li class="cm-main-pagination__no"><a href="#">2</a></li>
                    <li class="cm-main-pagination__no"><a href="#">3</a></li>
                    <li class="cm-main-pagination__ctrl"><a href="#"><svg width="20" height="20"><use href="#ico-arrow-right"></use></svg></a></li>
                </ul>
            </div>
        </div>
        <div class="u-template">
            <p>.cm-article-shop</p>
            <div class="u-gap">
                <div class="cm-article-shops">
                    <div class="cm-article-shops__head">
                        <h3 class="c-heading-bar">1. 新宿のシミュレーションゴルフ練習場14選</h3>
                    </div>
                    <div class="cm-article-shops__list">
                        <div class="cm-article-shop">
                            <h3 class="cm-article-shop__title">1.1 SWING24/7新宿店</h3>
                            <figure class="cm-article-shop__pic"><img src="<?= get_stylesheet_directory_uri() ?>/assets/img/dummy-shop.jpg"/></figure>
                            <p class="cm-article-shop__desc">新宿3丁目駅から徒歩3分にあるインドアゴルフ練習場です。 24時間年中無休なのでお好きな時間に最新シミュレーターでゴルフ練習が思う存分行えます。 打ちっぱなし練習や、コース練習を天候に左右される事なくプライベート空間で思う存分楽しめるのが魅力です。初心者の方からプロの方まで使っていただける屋内ゴルフ練習場です。</p>
                            <ul class="cm-article-shop__spec">
                                <li>
                                    <figure><img src="<?= get_stylesheet_directory_uri() ?>/assets/img/ico-24h.svg"/>
                                        <figcaption>24時間営業</figcaption>
                                    </figure>
                                </li>
                                <li>
                                    <figure><img src="<?= get_stylesheet_directory_uri() ?>/assets/img/ico-visitor.svg"/>
                                        <figcaption>ビジターOK</figcaption>
                                    </figure>
                                </li>
                                <li>
                                    <figure><img src="<?= get_stylesheet_directory_uri() ?>/assets/img/ico-rental.svg"/>
                                        <figcaption>無料レンタル</figcaption>
                                    </figure>
                                </li>
                                <li>
                                    <figure><img src="<?= get_stylesheet_directory_uri() ?>/assets/img/ico-club.svg"/>
                                        <figcaption>クラブ</figcaption>
                                    </figure>
                                </li>
                                <li>
                                    <figure><img src="<?= get_stylesheet_directory_uri() ?>/assets/img/ico-shoes.svg"/>
                                        <figcaption>レンタルシューズ</figcaption>
                                    </figure>
                                </li>
                            </ul>
                            <div class="cm-article-shop__info">
                                <dl>
                                    <dt>住所</dt>
                                    <dd>東京都新宿区新宿5-10-6 THEKINDAI22SHINJUKU 1F A</dd>
                                </dl>
                                <dl>
                                    <dt>お問合せ番号</dt>
                                    <dd>03-6273-1085</dd>
                                </dl>
                                <dl>
                                    <dt>営業時間</dt>
                                    <dd>24時間営業</dd>
                                </dl>
                                <dl>
                                    <dt>駐車場</dt>
                                    <dd>無し　新宿三丁目駅 C7出口　徒歩3分</dd>
                                </dl>
                                <dl>
                                    <dt>料金</dt>
                                    <dd>(税込)14.800円～</dd>
                                </dl>
                                <dl>
                                    <dt>打席数</dt>
                                    <dd>4打席</dd>
                                </dl>
                                <dl>
                                    <dt>シミュレーター</dt>
                                    <dd>【SWING24/7オリジナル】</dd>
                                </dl>
                            </div>
                        </div>
                        <div class="cm-article-shop">
                            <h3 class="cm-article-shop__title">1.1 SWING24/7新宿店</h3>
                            <figure class="cm-article-shop__pic"><img src="<?= get_stylesheet_directory_uri() ?>/assets/img/dummy-shop.jpg"/></figure>
                            <p class="cm-article-shop__desc">新宿3丁目駅から徒歩3分にあるインドアゴルフ練習場です。 24時間年中無休なのでお好きな時間に最新シミュレーターでゴルフ練習が思う存分行えます。 打ちっぱなし練習や、コース練習を天候に左右される事なくプライベート空間で思う存分楽しめるのが魅力です。初心者の方からプロの方まで使っていただける屋内ゴルフ練習場です。</p>
                            <ul class="cm-article-shop__spec">
                                <li>
                                    <figure><img src="<?= get_stylesheet_directory_uri() ?>/assets/img/ico-24h.svg"/>
                                        <figcaption>24時間営業</figcaption>
                                    </figure>
                                </li>
                                <li>
                                    <figure><img src="<?= get_stylesheet_directory_uri() ?>/assets/img/ico-visitor.svg"/>
                                        <figcaption>ビジターOK</figcaption>
                                    </figure>
                                </li>
                                <li>
                                    <figure><img src="<?= get_stylesheet_directory_uri() ?>/assets/img/ico-rental.svg"/>
                                        <figcaption>無料レンタル</figcaption>
                                    </figure>
                                </li>
                                <li>
                                    <figure><img src="<?= get_stylesheet_directory_uri() ?>/assets/img/ico-club.svg"/>
                                        <figcaption>クラブ</figcaption>
                                    </figure>
                                </li>
                                <li>
                                    <figure><img src="<?= get_stylesheet_directory_uri() ?>/assets/img/ico-shoes.svg"/>
                                        <figcaption>レンタルシューズ</figcaption>
                                    </figure>
                                </li>
                            </ul>
                            <div class="cm-article-shop__info">
                                <dl>
                                    <dt>住所</dt>
                                    <dd>東京都新宿区新宿5-10-6 THEKINDAI22SHINJUKU 1F A</dd>
                                </dl>
                                <dl>
                                    <dt>お問合せ番号</dt>
                                    <dd>03-6273-1085</dd>
                                </dl>
                                <dl>
                                    <dt>営業時間</dt>
                                    <dd>24時間営業</dd>
                                </dl>
                                <dl>
                                    <dt>駐車場</dt>
                                    <dd>無し　新宿三丁目駅 C7出口　徒歩3分</dd>
                                </dl>
                                <dl>
                                    <dt>料金</dt>
                                    <dd>(税込)14.800円～</dd>
                                </dl>
                                <dl>
                                    <dt>打席数</dt>
                                    <dd>4打席</dd>
                                </dl>
                                <dl>
                                    <dt>シミュレーター</dt>
                                    <dd>【SWING24/7オリジナル】</dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <p>.cm-article-hikaku</p>
            <div class="cm-article-hikaku">
                <div class="cm-article-hikaku__head">
                    <h3 class="c-heading-bar">2. 店舗比較一覧</h3>
                </div>
                <div class="cm-article-hikaku__body">
                    <table class="cm-article-hikaku-table">
                        <thead class="cm-article-hikaku-table__head">
                        <tr>
                            <th>店舗名</th>
                            <td>営業時間</td>
                            <td>駐車場</td>
                            <td>料金</td>
                            <td>打席タイプ</td>
                            <td>打席数</td>
                            <td>左打席</td>
                            <td>利用時間</td>
                        </tr>
                        </thead>
                        <tbody class="cm-article-hikaku-table__body">
                        <tr>
                            <th><a href="#">
                                    <figure>
                                        <figcaption>SWING24/7新宿店</figcaption><img src="<?= get_stylesheet_directory_uri() ?>/assets/img/dummy-shop.jpg"/>
                                    </figure></a></th>
                            <td>24時間</td>
                            <td>無し</td>
                            <td>14.800円～(税込)</td>
                            <td>オープン</td>
                            <td>4打席</td>
                            <td>無し</td>
                            <td>60分</td>
                        </tr>
                        <tr>
                            <th><a href="#">
                                    <figure>
                                        <figcaption>SWING24/7新宿店</figcaption><img src="<?= get_stylesheet_directory_uri() ?>/assets/img/dummy-shop.jpg"/>
                                    </figure></a></th>
                            <td>24時間</td>
                            <td>無し</td>
                            <td>14.800円～(税込)</td>
                            <td>オープン</td>
                            <td>4打席</td>
                            <td>無し</td>
                            <td>60分</td>
                        </tr>
                        <tr>
                            <th><a href="#">
                                    <figure>
                                        <figcaption>SWING24/7新宿店</figcaption><img src="<?= get_stylesheet_directory_uri() ?>/assets/img/dummy-shop.jpg"/>
                                    </figure></a></th>
                            <td>24時間</td>
                            <td>無し</td>
                            <td>14.800円～(税込)</td>
                            <td>オープン</td>
                            <td>4打席</td>
                            <td>無し</td>
                            <td>60分</td>
                        </tr>
                        <tr>
                            <th><a href="#">
                                    <figure>
                                        <figcaption>SWING24/7新宿店</figcaption><img src="<?= get_stylesheet_directory_uri() ?>/assets/img/dummy-shop.jpg"/>
                                    </figure></a></th>
                            <td>24時間</td>
                            <td>無し</td>
                            <td>14.800円～(税込)</td>
                            <td>オープン</td>
                            <td>4打席</td>
                            <td>無し</td>
                            <td>60分</td>
                        </tr>
                        <tr>
                            <th><a href="#">
                                    <figure>
                                        <figcaption>SWING24/7新宿店</figcaption><img src="<?= get_stylesheet_directory_uri() ?>/assets/img/dummy-shop.jpg"/>
                                    </figure></a></th>
                            <td>24時間</td>
                            <td>無し</td>
                            <td>14.800円～(税込)</td>
                            <td>オープン</td>
                            <td>4打席</td>
                            <td>無し</td>
                            <td>60分</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php endwhile; endif; ?>
<?php get_footer(); ?>