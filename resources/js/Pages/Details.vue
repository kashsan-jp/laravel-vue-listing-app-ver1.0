<script setup>
</script>
<template>
    <Head title="- Administer's note "/>
    <div class="title flex-column items-center ">
        <h1 class="text-xl mb-3">管理者開発ノート✍️</h1>
        <p class="dark:text-white dark:bg-slate-800 p-3">
            2025年5月から約2ヶ月の間、Laravel inertia-Vue アプリのデプロイ先を
            探して、Laravel-Cloud、Render、Google-Cloud、VPSなどそれぞれ試してみました。
            <br>
            <br>
            Laravel-CloudはGithubのコードをそのままリンクさせて使えるので便利ですが、
            画像データのストレジ(Publicフォルダ)に永続性がなく(Laravelスタッフに確認)、
            画像データを保持するためには別途Laravel版S3に接続し、コードを作成する必要があるようです。
            <br>
            <br>
            RenderのLaravelデプロイはDockerコンテナを使うのが基本みたいです。
            コンテナ技術の知識不足のため断念。
            <br>
            <br>
            ConoHaでVPSを立ち上げ、CentoOSのチューニング(PHP、SSL、SSH、Firewall、無料ドメインの取得)
            などを行い、Laravel、Vue、inertiaのインストールを完了し、VSCodeからサーバーにSSH接続し、
            直接サーバーのデータを編集し、現在このアプリを運用しています。
            <br>
            <br>
            将来的にはGithub ActionsでCI CD環境を構築していく予定です。
        </p>
    </div>
    <div>

    </div>

</template>