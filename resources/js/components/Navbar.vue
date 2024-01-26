<template>
    <nav class="nav">
        <img :src="logo" alt="logo" />
        <button class="button" @click="getData">GENERATE FILES</button>
    </nav>
</template>
  
<script>
import logo from '../../assets/logo.svg';

export default {
    name: 'Navbar',
    inject: ['emitter'],
    data() {
        return {
            logo: logo,
            postData: {
                selectedModule: null,
                clickout: null,
                width: null,
                height: null,
                top: null,
                left: null,
            },
        }
    },
    methods: {
        async getData() {
            const dataPromises = [
                new Promise((resolve) => {
                    this.emitter.once('provide-data-selected-module', (selectedModuleValue) => {
                        this.postData.selectedModule = selectedModuleValue;
                        resolve();
                    });
                    this.emitter.emit('get-data-selected-module');
                }),
                new Promise((resolve) => {
                    this.emitter.once('provide-data-module-settings', (data) => {
                        const { clickout, width, height, top, left } = data;
                    this.postData = {
                        ...this.postData,
                        clickout: String(clickout),
                        width: String(width),
                        height: String(height),
                        top: String(top),
                        left: String(left),
                    };
                        
                        resolve();
                    });
                    this.emitter.emit('get-data-module-settings');
                }),
            ];

            await Promise.all(dataPromises);

            const isValid = this.validatePostData(this.postData);
            if(!isValid){
                return alert('Please fill all fields');
            }else{
            const response = await fetch('/generate-files', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                },
                body: JSON.stringify(this.postData),
            });
        }

        },
        validatePostData(postData){
            const { selectedModule, clickout, width, height, top, left } = postData;
            if(selectedModule === null || clickout === null || width === null || height === null || top === null || left === null){
                return false;
            }
            console.log(postData);
            return true;
        }
    },
    
}
</script>
  
<style scoped>
.nav {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0.75rem 3rem;
    box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
}

.nav button {
    background: var(--orange);
    padding: 0.5rem 1rem;
    font-weight: 700;
    color: var(--white);
}
</style>