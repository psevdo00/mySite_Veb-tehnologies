<?php

    class Model_photo_album extends Model {

        public function get_data(){

            define("FOTOS", [
                "../mySite/img/cat_and_moon.jpg",
                "../mySite/img/boloto.jpg",
                "../mySite/img/romashka.jpg",
                "../mySite/img/head.jpg",
                "../mySite/img/floor.jpg",
                "../mySite/img/lavanda.jpg",
                "../mySite/img/picture_art.jpg",
                "../mySite/img/rosa.jpg",
                "../mySite/img/stone_home.jpg",
                "../mySite/img/Yellow_bool.jpg",
                "../mySite/img/second_romashka.jpg",
                "../mySite/img/sky.jpg",
                "../mySite/img/star_sky.jpg",
                "../mySite/img/sakura.jpg",
                "../mySite/img/dragon.jpg"
            ]);
            
            define("TITLES",[
                "Кот на фоне луны",
                "Болото с камышами",
                "Ромашка под стеклом",
                "Каменная арка в виде сердца",
                "Букет цветов",
                "Лавандовое поле",
                "Картина современного искусства",
                "Роза с капельками росы",
                "Каменный дом на полуострове",
                "Желтое неведомое существо",
                "Ромашки с капельками росы",
                "Облачное небо",
                "Звездное небо",
                "Линия цветущей сакуры",
                "Золотой дракон"
            ]);

            return array(FOTOS, TITLES);

        }

    }