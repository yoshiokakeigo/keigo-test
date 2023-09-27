<script>
import { ref, reactive } from 'vue';
export default {
  setup() {
    const show = ref('1')
    const array = reactive({
      hoge: [{
        count: 1,
        name: 'keigo'
      },
      {
        count: 2,
        name: 'kouki'
      },
      {
        count: 3,
        name: 'ryota'
      }],
      hogehoge: [{
        count: 5,
        name: 'yoshiki'
      },
      {
        count: 6,
        name: 'taiti'
      },
      {
        count: 7,
        name: 'kazuma'
      }]
    })
    const select = (num) => {
      show.value = num;
    }
    return {
      show, select, array
    }
  }
}
</script>
<template>
  <div id="appe">
    <div class="tabgroup">
      <ul class="tabnav">
        <li @click="select('1')" v-bind:class="{ 'active': show == '1' }">
          タブ1ボタン
        </li>
        <li @click="select('2')" v-bind:class="{ 'active': show == '2' }">
          タブ2ボタン
        </li>
      </ul>
      <div class="tabcontent">
        <div v-if="show == '1'" class="tabcontent-list">タブ1の内容</div>
        <div v-else-if="show == '2'" class="tabcontent-list">タブ2の内容</div>
      </div>
      <div v-for="(array, index, aa) in array" :key="array.hoge">
        <p class="text-gray-600">{{ index }}のグループ</p>
        <div v-for="(array, index) in array" :key="array.hoge">
          <p>No.{{ array.count }}:{{ array.name }}</p>
        </div>
      </div>
    </div>
  </div>
</template>
<!-- <template>
  <div>{{ text }}</div>
  <li @click="change(1)" v-bind:class="[show === 1 ? 'active' : '']">ああ</li>
  <li v-if="show == 1" class="active">aaaa</li>
</template>
<script>
import { ref } from 'vue';
export default {
  setup() {
    const text = ref('ああ');
    const show = ref(2);
    const change = (num) => {
      show.value = num;
    };
    return {
      text, change, show
    }

  }
}
</script>
<style>
.active {
  display: none;
}
</style> -->