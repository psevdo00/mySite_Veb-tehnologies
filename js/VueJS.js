const { createApp } = Vue;

        createApp({
            data() {
                return {
                    testValue: "" // Поле данных для привязки
                };
            }
        }).mount('#app');