<?php
    function getRandomData( $field, $parameters ) {
        $generator_data = array(
            'flight_types' => array(
                'departing',
                'arriving'
            ),
            'cities' => array(
                'Санкт-Петербург',
                'Москва',
                'Челябинск',
                'Ростов-на-Дону',
                'Франкфурт-на-Майне',
                'Вашингтон',
                'Кингстон',
                'Шарм-эль-Шейх',
                'Токио',
                'Пекин',
                'Торонто',
                'Амстердам',
                'Владивосток',
                'Нью-Мексико',
                'Владивосток',
                'Комсомольск-на-Амуре',
                'Киев',
                'Париж',
                'Лондон',
                'Тель-Авив',
                'Гонконг',
                'Берлин',
                'Мюнхен',
                'Ереван',
                'Барселона',
                'Рим',
                'Екатеринбург',
                'Брюссель',
                'Афины',
                'Шанхай'
            ),
            'airlines' => array(
                'Airfrance, airfrance',
                'Аэрофлот, aeroflot',
                'Lufthansa, lufthansa',
                'Air New Zealand, air_new_zealand',
                'China Eastern Airlines, china_eastern_airlines',
                'British Airways, british_airways',
                'United Airlines, united_airlines',
                'Vietnam Airlines, vietnam_airlines',
                'Iberia Airlines, iberia_airlines',
                'ЮТэйр, utair',
                'Iran Air, iran_air',
                'Alitalia, alitalia',
                'Cambodia Angkor Air, cambodia_angkor_air',
                'Japan Airlines, japan_airlines',
                'Трансаэро, transaero',
                'Czech Airlines, czech_airlines'
            ),
            'aircrafts' => array(
                'Boening 737-800, B737',
                'Boening 737-200ER, B737',
                'Airbus 330, A330',
                'Airbus 340, A340',
                'Boening 737-8, B747',
                'Airbus 320, A320'
            ),
            'statuses_departing' => array(
                'Регистрация',
                'Ожидание посадки',
                'Посадка закончена',
                'Вылетел',
                'Задерживается до ' . $parameters,
                'Отменен'
            ),
            'statuses_arriving' => array(
                'По расписанию',
                'Летит',
                'Приземлилися',
                'Задерживается до ' . $parameters,
                'Отменен'
            ),
            'notes' => array(
                '',
                'Код шеринг с United Airlines',
                'Код шеринг с Air New Zealand',
                'Код шеринг с Lufthansa и Iberia Airlines',
                'Обед подаваться не будет',
                'Ужин подаваться не будет',
                'Пассажирам первого класса разрешено курение на борту',
                'Транзитный рейс с пересадкой в Риме',
                'Курение на борту разрешено'
            )
        );
        
        $data = $generator_data[ $field ];
        
        if ( isset( $data ) ) {
            return $data[ mt_rand( 0, count( $data ) - 1 ) ];
        } else {
            return '';
        }
    }
    
    function getRandomTime() {
        $h_min = 0;
        $h_max = 24;
        $h_step = 1;
        $m_min = 0;
        $m_max = 60;
        $m_step = 15;
        
        $h = ( $h_min + $h_step * mt_rand( 1, $h_max / $h_step ) ) % $h_max;
        $m = ( $m_min + $m_step * mt_rand( 1, $m_max / $m_step ) ) % $m_max;
        
        if ( strlen( ( string ) $h ) < 2 ) {
            $h = '0' . $h;
        }
        
        if ( strlen( ( string ) $m ) < 2 ) {
            $m = '0' . $m;
        }
        
        return $h . ':' . $m;
    }
    
    function getRandomFlightNumber() {
        $letters = 'ABCDEFGHJKLMNPQRSTUVWXZ';
        $letters_count = strlen( $letters );
        
        return $letters[ rand( 0, $letters_count - 1 ) ] . $letters[ rand( 0, $letters_count - 1 ) ] . rand( 1000, 9999 );
    }

    $headings = array(
        'flight_type' => 'Тип',
        'flight_number' => 'Рейс',
        'airline_name' => 'Авиакомпания',
        'aircraft_type' => 'Борт',
        'aircraft_type_short' => 'Борт',
        'destination' => 'Направление',
        'time' => 'Время',
        'status' => 'Статус',
        'note' => 'Примечания'
    );
    
    $content = array();
    
    for ( $i = 0; $i < 100; $i++ ) {
        $airline = explode( ', ', getRandomData( 'airlines' ) );
        $aircraft = explode( ', ', getRandomData( 'aircrafts' ) );
        $flight_type = getRandomData( 'flight_types' );
    
        array_push( $content, array(
            'flight_type' => $flight_type,
            'flight_number' => getRandomFlightNumber(),
            'airline_name' => $airline[ 0 ],
            'airline_classname' => $airline[ 1 ],
            'aircraft_type' => $aircraft[ 0 ],
            'aircraft_type_short' => $aircraft[ 1 ],
            'destination' => getRandomData( 'cities' ),
            'time' => getRandomTime(),
            'status' => getRandomData( 'statuses_' . $flight_type, getRandomTime() ),
            'note' => getRandomData( 'notes' )
        ) );
    }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta name="robots" content="noindex"/>
        <title>Ya: task 1</title>
        <link type="text/css" rel="stylesheet/less" href="/ya/1/styles/reset.css"/>
        <link type="text/css" rel="stylesheet/less" href="/ya/1/styles/main.css"/>
        <script type="text/javascript" src="/ya/1/scripts/less.min.js"></script>
    </head>
    <body>
        <div class="page">
            <div class="board">
                <div class="board__header header">
                    <div class="board__container">
                        <div class="header__panel"></div>
                        <div class="header__headings row">
                            <?php foreach ( $headings as $item_name => $item_caption ) { ?>
                            
                            <p class="row__item row__item--<?php echo $item_name; ?>">
                                <?php echo $item_caption; ?>
                            </p>
                            
                            <?php } ?>
                            
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
                
                <input class="board__filter board__filter--flight_type-departing" type="checkbox" checked="checked">
                <input class="board__filter board__filter--flight_type-arriving" type="checkbox" checked="checked">
                
                <div class="board__content content">
                    <div class="board__container">
                        <?php foreach ( $content as $item ) { ?>
                        
                        <a class="row row--airline-<?php echo $item[ 'airline_classname' ]; ?> row--flight_type-<?php echo $item[ 'flight_type' ]; ?>" href="#<?php echo $item[ 'flight_number' ]; ?>">
                        
                            <p class="row__item row__item--flight_type row__item--flight_type-departing">
                                <span class="row__item__image"></span>
                                <span class="row__item__text">Вылет</span>
                                <span class="clear"></span>
                            </p>
                            
                            <p class="row__item row__item--flight_type row__item--flight_type-arriving">
                                <span class="row__item__image"></span>
                                <span class="row__item__text">Прилет</span>
                                <span class="clear"></span>
                            </p>
                            
                            <p class="row__item row__item--flight_number">
                                <span class="row__item__image airline_logo"></span>
                                <span class="row__item__text"><?php echo $item[ 'flight_number' ]; ?></span>
                                <span class="clear"></span>
                            </p>
                            
                            <p class="row__item row__item--airline_name">
                                <span class="row__item__image airline_logo"></span>
                                <span class="row__item__text"><?php echo $item[ 'airline_name' ]; ?></span>
                                <span class="clear"></span>
                            </p>
                            
                            <p class="row__item row__item--aircraft_type"><?php echo $item[ 'aircraft_type' ]; ?></p>
                            
                            <p class="row__item row__item--aircraft_type_short"><?php echo $item[ 'aircraft_type_short' ]; ?></p>
                            
                            <p class="row__item row__item--destination">
                                <span class="row__item__overflowed"><?php echo $item[ 'destination' ]; ?></span>
                            </p>
                            
                            <p class="row__item row__item--time"><?php echo $item[ 'time' ]; ?></p>
                            
                            <p class="row__item row__item--status">
                                <span class="row__item__overflowed"><?php echo $item[ 'status' ]; ?></span>
                            </p>
                            
                            <p class="row__item row__item--note">
                                <span class="row__item__overflowed"><?php echo $item[ 'note' ]; ?></span>
                            </p>
                            
                            <div class="clear"></div>
                        </a>
                        
                        <?php } ?>
                    </div>
                </div>
                
                <div class="board__popup_container">
                    <?php foreach ( $content as $item ) { ?>
                
                    <div class="popup popup--airline-<?php echo $item[ 'airline_classname' ]; ?> popup--flight_type-<?php echo $item[ 'flight_type' ]; ?>" id="<?php echo $item[ 'flight_number' ]; ?>">
                        <a href="#" class="popup__mount"></a>
                        <div class="popup__content">
                            <a href="#" class="popup__content__close">Закрыть</a>
                            
                            <div class="airline_logo"></div>
                        
                            <p class="section section--airline_name">
                                <span class="section__label"><?php echo $headings[ 'airline_name' ]; ?>:</span>
                                <span class="section__info"><?php echo $item[ 'airline_name' ]; ?></span>
                            </p>
                            
                            <p class="section section--flight_number">
                                <span class="section__label"><?php echo $headings[ 'flight_number' ]; ?>:</span>
                                <span class="section__info"><?php echo $item[ 'flight_number' ]; ?></span>
                            </p>
                            
                            <p class="section section--aircraft_type">
                                <span class="section__label"><?php echo $headings[ 'aircraft_type' ]; ?>:</span>
                                <span class="section__info"><?php echo $item[ 'aircraft_type' ]; ?></span>
                            </p>
                            
                            <p class="section section--destination">
                                <span class="section__label"><?php echo $headings[ 'destination' ]; ?>:</span>
                                <span class="section__info"><?php echo $item[ 'destination' ]; ?></span>
                            </p>
                            
                            <p class="section section--time">
                                <span class="section__label"><?php echo $headings[ 'time' ]; ?>:</span>
                                <span class="section__info">
                                    <span class="prefix prefix--flight_type prefix--flight_type-departing">вылет</span>
                                    <span class="prefix prefix--flight_type prefix--flight_type-arriving">прилет</span>
                                     в <?php echo $item[ 'time' ]; ?>
                                </span>
                            </p>
                            
                            <p class="section section--status">
                                <span class="section__label"><?php echo $headings[ 'status' ]; ?>:</span>
                                <span class="section__info"><?php echo $item[ 'status' ]; ?></span>
                            </p>
                            
                            <p class="section section--note">
                                <span class="section__label"><?php echo $headings[ 'note' ]; ?>:</span>
                                <span class="section__info"><?php echo $item[ 'note' ]; ?></span>
                            </p>
                        </div>
                    </div>
                    
                    <?php } ?>
                </div>
            </div>
        </div>
    </body>
</html>