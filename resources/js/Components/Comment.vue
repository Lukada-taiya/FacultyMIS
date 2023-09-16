<template>
    <li class="py-4">
        <div class="commenterImage">
            <img src="http://placekitten.com/50/50" />
        </div>
        <div class="commentText">
            <p class="text-sm text-gray-500 font-semibold">
                {{
                    $page.props.auth.user.id === data.sender.id
                        ? "You"
                        : data.sender.name
                }}
            </p>
            <p class="p-2 pl-3">{{ data.body }}</p>
            <div class="text-right">
                <span class="date sub-text">{{ data.date_created }}</span>
            </div>
        </div>
    </li>
</template>
<script>
export default {
    props: { data: Object },
};
</script>
<style scoped>
/* @import url(//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css); */

li {
    margin: 0;
    margin-top: 10px;
}
li > div {
    display: table-cell;
}
.commenterImage {
    width: 3rem;
    margin-right: 1.2rem;
    height: 100%;
    float: left;
}
.commenterImage img {
    width: 100%;
    border-radius: 50%;
}
.commentText p {
    margin: 0;
}
.sub-text {
    color: #aaa;
    font-family: verdana;
    font-size: 11px;
}
</style>
