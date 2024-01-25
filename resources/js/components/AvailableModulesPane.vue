<template>
    <section class="pane available-modules-pane">
        <h3>AVAILABLE MODULES</h3>
        <button class="available-modules-pane__button button" @click="selectModule('BACKGROUND')">
            BACKGROUND
        </button>
        <button class="available-modules-pane__button button" @click="selectModule('TYPO')">
            TYPO
        </button>
    </section>
</template>

<script>

export default {
    name: 'AvailableModulesPane',
    inject: ['emitter'],
    methods: {
        selectModule(module) {
            this.emitter.emit('module-selected', module);
        }
    },
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

.available-modules-pane__button {
    display: flex;
    width: 100%;
    justify-content: center;
    align-items: center;
    background: var(--gray-dark);
    font-weight: 500;
    color: var(--white);
    height: 6rem;
    font-size: 1.25rem;
    line-height: 1.75rem;
}
</style>
