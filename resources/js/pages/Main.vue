<template>
    <div class="main">
        <available-modules-pane></available-modules-pane>
        <selected-module-pane></selected-module-pane>
        <module-settings-pane></module-settings-pane>
    </div>
</template>

<script>

import AvailableModulesPane from '../components/AvailableModulesPane.vue';
import SelectedModulePane from '../components/SelectedModulePane.vue';
import ModuleSettingsPane from '../components/ModuleSettingsPane.vue';


export default {
    components: {
        AvailableModulesPane,
        SelectedModulePane,
        ModuleSettingsPane
    },

}
</script>

<style scoped>
.main {
    width: 100%;
    height: calc(100vh - 74px);
    display: grid;
    grid-template-columns: repeat(3, minmax(0, 1fr));
    gap: 2rem;
    padding: 1rem;
}
</style>
