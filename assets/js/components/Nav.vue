<template>
    <div>
        <div class="m-2 mt-3">
            <div class="bs-example">
                <ul class="nav nav-pills" style="margin-left: 1rem">
                    <li  class="nav-item active">
                        <router-link :to="'/Home'" class="nav-link pform-pills"><strong>Home</strong></router-link>
                    </li>
                    <li  class="nav-item">
                        <router-link :to="'/exam'" class="nav-link pform-pills"><strong>Pruefung</strong></router-link>
                    </li>
                    <li class="nav-item" v-if="isAdmin">
                        <router-link :to="'/learning'" class="nav-link pform-pills" ><strong>Lernen</strong></router-link>
                    </li>
                </ul>
            </div>

            <div class="tab-content">
                <div id="Home" class="tab-pane fade">
create
                </div>
                <div id="exam" class="tab-pane fade">
     edit
                </div>
                <div id="learning" class="tab-pane fade">
actions
                </div>
            </div>
        </div>
        hi
    </div>
</template>
<script>

export default {

}
</script>