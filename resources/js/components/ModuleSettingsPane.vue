<template>
    <section class="pane module-settings-pane">
        <h3>MODULE SETTINGS</h3>
        <div class="form-group">
            <label for="clickout">Clickout</label>
            <div>
                <input id="clickout" type="text" name="clickout" placeholder="some url" v-model="clickout" />
            </div>
        </div>
        <div class="row-flex">
            <div class="form-group">
                <label for="width">Width (%)</label>
                <div>
                    <input id="width" type="number" name="width" placeholder="Width" v-model="width" min="0" max="100" />
                </div>
            </div>
            <div class="form-group">
                <label for="height">Height (%)</label>
                <div>
                    <input id="height" type="number" name="height" placeholder="Height" v-model="height" min="0"
                        max="100" />
                </div>
            </div>
        </div>

        <div class="row-flex">
            <div class="form-group">
                <label for="top">
                    Positon X (%)
                </label>
                <div>
                    <input id="top" type="number" name="top" placeholder="Position X" v-model="top" min="0" max="100" />
                </div>
            </div>
            <div class="form-group">
                <label for="left">
                    Positon Y (%)
                </label>
                <div>
                    <input id="left" type="number" name="left" placeholder="Positon Y" v-model="left" min="0" max="100" />
                </div>
            </div>
        </div>
    </section>
</template>
  
<script>
export default {
    name: 'ModuleSettingsPane',
    inject: ['emitter'],
    data() {
        return {
            clickout: 'https://appverk.com',
            width: 50,
            height: 50,
            top: 0,
            left: 0,
        };
    },
    watch: {
        clickout(value) {
            this.clickout = value;
        },
        width(value) {
            this.width = value;
        },
        height(value) {
            this.height = value;
        },
        top(value) {
            this.top = value;
        },
        left(value) {
            this.left = value;
        },
    },
    created() {
        // this.emitter.on('get-data-selected-module', (module) => {
        //     this.emitter.emit('provide-data-selected-module');
        // });
        this.emitter.on('get-data-module-settings', () => {

            this.emitter.emit('provide-data-module-settings', {
                clickout: this.clickout,
                width: this.width,
                height: this.height,
                top: this.top,
                left: this.left,
            });
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

.row-flex {
    display: flex;
    gap: 2rem;
}

.form-group label {
    display: block;
    font-size: 0.875rem;
    line-height: 1.5rem;
    font-weight: 500;
}

.form-group div {
    position: relative;
    margin-top: 0.5rem;
}

.form-group input {
    display: block;
    width: 100%;
    padding: 0.375rem 1.5rem;
    line-height: 1.5rem;
    border: solid 1px var(--gray-dark);
}
</style>
