<template>
  <Card class="flex flex-col">
    <div class="p-6">
      <Heading :level="3">System Versions</Heading>
      <table class="w-full text-left table-collapse">
        <tbody class="align-baseline">
        <tr>
          <td class="p-2 font-bold">OS</td>
          <td class="p-2">{{ os }}</td>
        </tr>
        <tr>
          <td class="p-2 font-bold">PHP Version</td>
          <td class="p-2">{{ php }}</td>
        </tr>
        <tr>
          <td class="p-2 font-bold">Database</td>
          <td class="p-2">{{ database }}</td>
        </tr>
        <tr>
          <td class="p-2 font-bold">Laravel Version</td>
          <td class="p-2">{{ laravel }}</td>
        </tr>
        <tr>
          <td class="p-2 font-bold">Nova Version</td>
          <td class="p-2">{{ nova }}</td>
        </tr>
        </tbody>
      </table>
    </div>
  </Card>
</template>

<script>
export default {
  props: [
    'card',

    // The following props are only available on resource detail cards...
    // 'resource',
    // 'resourceId',
    // 'resourceName',
  ],

  data () {
      return {
        os: null,
        php: null,
        database: null,
      }
    },

  mounted() {
    Nova.request().get('/nova-vendor/kussie/version-card/versions')
        .then(({data}) => {
          this.os = data.os
          this.php = data.php
          this.database = data.database
          this.laravel = data.laravel
          this.nova = data.nova
        })
  },
}
</script>
