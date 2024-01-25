<template>
    <section class="pane selected-module-pane" ref="selectedModulePane">
        <h3>SELECTED MODULE</h3>
        <div class="selected-module-pane__module">
            <span>{{ selectedValue }}</span>
        </div>
    </section>
</template>
  
<script>
export default {
    name: 'SelectedModulePane',
    inject: ['emitter'],
    data() {
        return {
            selectedValue: 'BACKGROUND'
        };
    },
    created() {
        this.emitter.on('module-selected', (module) => {
            this.selectedValue = module;
        });
        this.emitter.on('get-data-selected-module', () => {
            this.emitter.emit('provide-data-selected-module', this.selectedValue);
        });
       
    }
}

</script>
  
<style scoped>
.pane {
    display: grid;
    grid-auto-rows: min-content;
    gap: 2rem;
    background: var(--gray-light);
    padding: 1.5rem;
}

.pane h3 {
    font-weight: 700;
}

.selected-module-pane__module {
    display: flex;
    justify-content: center;
    align-items: center;
    background: var(--gray-dark);
    height: 2.5rem;
    width: 100%;
    font-weight: 500;
    color: var(--white);
}
</style>
  