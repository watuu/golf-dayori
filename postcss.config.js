module.exports = {
    plugins: [
        require('autoprefixer')({
            // browserslistはpackage.jsonへ記述
            // browsers: [
            //     'last 1 versions',
            //     'ie >= 11', // last 2 versionsの設定でie10以上になります。
            //     'iOS >= 10',
            //     'Android >= 4.4'
            // ],
            grid: "autoplace",
            cascade: true
        }),
        require('css-declaration-sorter')({
            order: "smacss"
        })
    ],
}
