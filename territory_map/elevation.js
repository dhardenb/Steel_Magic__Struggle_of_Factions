// establishing elevation of tiles /////////////////////////////
function elevation_carving(){




    function tiles_elevation(){
// tile elevation array establisbhed
        for (var x = 0; x < columns; x++) {
            tile_elevation[x] = new Array(rows);
            for (var y = 0; y < rows; y++) {
                tile_elevation[x][y] = 1;
            }
        }
    }

    function seed_peaks(){
// mountain peak tiles are seeded
        for (var x = 0; x < columns; x++) {
            for (var y = 0; y < rows; y++) {
                var r_elevation = Math.floor(Math.random()* mountain_level);

                if (r_elevation == 1){
                    tile_elevation[x][y] = 5;
                }
            }
        }
    }

    function seed_oceans(){
// ocean tiles are seeded
        for (var x = 0; x < columns; x++) {
            for (var y = 0; y < rows; y++) {
                var r_elevation = Math.floor(Math.random()* ocean_level);

                if (r_elevation == 1){

                    tile_elevation[x][y] = -2;
                    //}
                }
            }
        }
    }


    function seed_lakes(){
// lake tiles are seeded
        for (var x = 0; x < columns; x++) {
            for (var y = 0; y < rows; y++) {
                var r_elevation = Math.floor(Math.random()* (lake_level / 2));

                if (tile_elevation[x][y] == 0 || tile_elevation[x][y] == 1){
                    if (r_elevation == 1){
                        tile_elevation[x][y] = -1;
                    }
                }
            }
        }
    }

    function initial_ocean_growth()
    {
// oceans are grown from ocean seeds
        for (var x = 0; x < columns; x++) {
            for (var y = 0; y < rows; y++) {
                var o_count = 0; // variable that tracks how many neighbors with a ocean seed that each tile has, resets for each tile

                // oceans  cannot spread over existing elevation -1 or 5 tiles, these are mountain peaks and oceans
                if (tile_elevation[x][y] != 5 && tile_elevation[x][y] != -2){

                    // look at neigboring tiles to see if they have mountain peaks


                    //don't look at neighbor to the left if on the left edge of map
                    if (x > 0) {
                        if (tile_elevation[x - 1][y] == -2){
                            o_count = o_count + 1;
                        }
                    }

                    //don't look at neighbor to the right if on the left edge of map
                    if (x < (columns - 1)) {
                        if (tile_elevation[x + 1][y] == -2){
                            o_count = o_count + 1;
                        }
                    }
                    //don't look at neighbor to the top if on the top edge of map
                    if (y > 0) {
                        if (tile_elevation[x][y - 1] == -2){
                            o_count = o_count + 1;
                        }
                    }

                    //don't look at neighbor to the bottom if on the bottom edge of map
                    if (y < (rows - 1)) {
                        if (tile_elevation[x][y + 1] == -2){
                            o_count = o_count + 1;
                        }
                    }
                    // set Farming emergence odds based on number of farming neihbors

                    // setting a random number, 1 - 100, to use in determining chances of ocean growth
                    var o_odds = Math.floor(Math.random()*ocean_level)

                    switch(o_count)
                    {
                        case 1:
                        {
                            if (o_odds < (ocean_level / 1.5) ) {
                                tile_elevation[x][y] = -2;

                            }
                        }
                            break;
                        case 2:
                        {
                            if (o_odds < (ocean_level / 1.25) ) {
                                tile_elevation[x][y] = -2;


                            }
                        }
                            break;
                        case 3:
                        {
                            if (o_odds < (ocean_level / 1) ) {
                                tile_elevation[x][y] = -2;

                            }
                        }
                            break;
                        case 4:
                        {
                            if (o_odds < (ocean_level / 0.75) ) {
                                tile_elevation[x][y] = -2;

                            }
                        }
                            break;

                    }




                }
            }
        }
    }

    function lake_growth()
    {
// oceans are grown from ocean seeds
        for (var x = 0; x < columns; x++) {
            for (var y = 0; y < rows; y++) {
                var o_count = 0; // variable that tracks how many neighbors with a ocean seed that each tile has, resets for each tile

                // oceans  cannot spread over existing elevation -1 or 5 tiles, these are mountain peaks and oceans
                if (tile_elevation[x][y] > -1 && tile_elevation[x][y] < 2){


                    //don't look at neighbor to the left if on the left edge of map
                    if (x > 0) {
                        if (tile_elevation[x - 1][y] == -1){
                            o_count = o_count + 1;
                        }
                    }

                    //don't look at neighbor to the right if on the left edge of map
                    if (x < (columns - 1)) {
                        if (tile_elevation[x + 1][y] == -1){
                            o_count = o_count + 1;
                        }
                    }
                    //don't look at neighbor to the top if on the top edge of map
                    if (y > 0) {
                        if (tile_elevation[x][y - 1] == -1){
                            o_count = o_count + 1;
                        }
                    }

                    //don't look at neighbor to the bottom if on the bottom edge of map
                    if (y < (rows - 1)) {
                        if (tile_elevation[x][y + 1] == -1){
                            o_count = o_count + 1;
                        }
                    }
                    // set Farming emergence odds based on number of farming neihbors

                    // setting a random number, 1 - 100, to use in determining chances of ocean growth
                    var o_odds = Math.floor(Math.random()*50);

                    switch(o_count)
                    {
                        case 1:
                        {
                            if (o_odds < 20 ) {
                                tile_elevation[x][y] = -1;

                            }
                        }
                            break;
                        case 2:
                        {
                            if (o_odds < 27 ) {
                                tile_elevation[x][y] = -1;


                            }
                        }
                            break;
                        case 3:
                        {
                            if (o_odds <  31) {
                                tile_elevation[x][y] = -1;

                            }
                        }
                            break;
                        case 4:
                        {
                            if (o_odds < 36 ) {
                                tile_elevation[x][y] = -1;

                            }
                        }
                            break;

                    }




                }
            }
        }
    }



    function fill_oceans()
    {
// oceans are grown from ocean seeds
        for  (var i = 0; i < 2; i++) {
            for (var x = 0; x < columns; x++) {
                for (var y = 0; y < rows; y++) {
                    var o_count = 0; // variable that tracks how many neighbors with a ocean seed that each tile has, resets for each tile

                    // oceans  cannot spread over existing elevation -1 or 5 tiles, these are mountain peaks and oceans
                    if (tile_elevation[x][y] != 5 && tile_elevation[x][y] != -2){



                        //don't look at neighbor to the left if on the left edge of map
                        if (x > 0) {
                            if (tile_elevation[x - 1][y] == -2){
                                o_count = o_count + 1;
                            }
                        }

                        //don't look at neighbor to the right if on the left edge of map
                        if (x < (columns - 1)) {
                            if (tile_elevation[x + 1][y] == -2){
                                o_count = o_count + 1;
                            }
                        }
                        //don't look at neighbor to the top if on the top edge of map
                        if (y > 0) {
                            if (tile_elevation[x][y - 1] == -2){
                                o_count = o_count + 1;
                            }
                        }

                        //don't look at neighbor to the bottom if on the bottom edge of map
                        if (y < (rows - 1)) {
                            if (tile_elevation[x][y + 1] == -2){
                                o_count = o_count + 1;
                            }
                        }


                        // setting a random number, 1 - 100, to use in determining chances of ocean growth
                        var o_odds = Math.floor(Math.random()*ocean_level)
                        // attemps to grow ocean over tiles that are mostly already surrounded by ocean, to "fill in" the oceans
                        switch(o_count)
                        {
                            case 2:
                            {
                                if (o_odds < (ocean_level / 1.15) ) {
                                    tile_elevation[x][y] = -2;

                                }
                            }
                                break;
                            case 3:
                            {
                                if (o_odds < (ocean_level / 0.75) ) {
                                    tile_elevation[x][y] = -2;

                                }
                            }
                                break;
                            case 4:
                            {
                                if (o_odds < (ocean_level / 0.5) ) {
                                    tile_elevation[x][y] = -2;

                                }
                            }
                                break;

                        }

                        // the greater the number of neighbors with farming, the more likely farming is to emerge. There is a tiny chance for spontaneous emergence


                    }
                }
            }
        }
    }


    function remove_peaks_from_ocean()
    {
// oceans are grown from ocean seeds
        for (var x = 0; x < columns; x++) {
            for (var y = 0; y < rows; y++) {
                var o_count = 0; // variable that tracks how many neighbors with a ocean seed that each tile has, resets for each tile

                // oceans  cannot spread over existing elevation -1 or 5 tiles, these are mountain peaks and oceans
                if (tile_elevation[x][y] == 5 ){

                    // look at neigboring tiles to see if they have oceans


                    //don't look at neighbor to the left if on the left edge of map
                    if (x > 0) {
                        if (tile_elevation[x - 1][y] == -2){
                            o_count = o_count + 1;
                        }
                    }

                    //don't look at neighbor to the right if on the left edge of map
                    if (x < (columns - 1)) {
                        if (tile_elevation[x + 1][y] == -2){
                            o_count = o_count + 1;
                        }
                    }
                    //don't look at neighbor to the top if on the top edge of map
                    if (y > 0) {
                        if (tile_elevation[x][y - 1] == -2){
                            o_count = o_count + 1;
                        }
                    }

                    //don't look at neighbor to the bottom if on the bottom edge of map
                    if (y < (rows - 1)) {
                        if (tile_elevation[x][y + 1] == -2){
                            o_count = o_count + 1;
                        }
                    }


                    // setting a random number, 1 - 100, to use in determining chances of ocean growth
                    var o_odds = Math.floor(Math.random()*ocean_level)

                    switch(o_count)
                    {
                        case 4:
                        {
                            if (o_odds < (ocean_level / 0.25) ) {
                                tile_elevation[x][y] = -2;

                            }
                        }
                            break;

                    }




                }
            }
        }
    }

    function uneven_coastline()
    {
// oceans are grown from ocean seeds
        for (var x = 0; x < columns; x++) {
            for (var y = 0; y < rows; y++) {
                var o_count = 0; // variable that tracks how many neighbors with a ocean seed that each tile has, resets for each tile

                // oceans  cannot spread over existing elevation -1 or 5 tiles, these are mountain peaks and oceans
                if (tile_elevation[x][y] > 0 ){

                    // look at neigboring tiles to see if they have oceans


                    //don't look at neighbor to the left if on the left edge of map
                    if (x > 0) {
                        if (tile_elevation[x - 1][y] == -2){
                            o_count = o_count + 1;
                        }
                    }

                    //don't look at neighbor to the right if on the left edge of map
                    if (x < (columns - 1)) {
                        if (tile_elevation[x + 1][y] == -2){
                            o_count = o_count + 1;
                        }
                    }
                    //don't look at neighbor to the top if on the top edge of map
                    if (y > 0) {
                        if (tile_elevation[x][y - 1] == -2){
                            o_count = o_count + 1;
                        }
                    }

                    //don't look at neighbor to the bottom if on the bottom edge of map
                    if (y < (rows - 1)) {
                        if (tile_elevation[x][y + 1] == -2){
                            o_count = o_count + 1;
                        }
                    }


                    // setting a random number, 1 - 100, to use in determining chances of ocean growth
                    var o_odds = Math.floor(Math.random()*ocean_level)

                    switch(o_count)
                    {
                        case 1:
                        {
                            if (o_odds < (ocean_level / 6.5) ) {
                                tile_elevation[x][y] = -2;

                            }
                        }
                            break;

                    }




                }
            }
        }
    }


    function seed_coastal_plain()
    {
// oceans are grown from ocean seeds
        for (var x = 0; x < columns; x++) {
            for (var y = 0; y < rows; y++) {
                var o_count = 0; // variable that tracks how many neighbors with a ocean seed that each tile has, resets for each tile


                if (tile_elevation[x][y] > -1 &&  tile_elevation[x][y] < 2) {
                    // look at neigboring tiles to see if they have oceans


                    //don't look at neighbor to the left if on the left edge of map
                    if (x > 0) {
                        if (tile_elevation[x - 1][y] == -2){
                            o_count = o_count + 1;
                        }
                    }

                    //don't look at neighbor to the right if on the left edge of map
                    if (x < (columns - 1)) {
                        if (tile_elevation[x + 1][y] == -2){
                            o_count = o_count + 1;
                        }
                    }
                    //don't look at neighbor to the top if on the top edge of map
                    if (y > 0) {
                        if (tile_elevation[x][y - 1] == -2){
                            o_count = o_count + 1;
                        }
                    }

                    //don't look at neighbor to the bottom if on the bottom edge of map
                    if (y < (rows - 1)) {
                        if (tile_elevation[x][y + 1] == -2){
                            o_count = o_count + 1;
                        }
                    }


                    // setting a random number, 1 - 100, to use in determining chances of coast plain seeding
                    var o_odds = Math.floor(Math.random()*ocean_level);

                    switch(o_count)
                    {
                        case 1:
                        {
                            if (o_odds < (ocean_level / 2.5) ) {
                                tile_elevation[x][y] = 0;

                            }
                        }
                            break;
                        case 2:
                        {
                            if (o_odds < (ocean_level / 2.5) ) {
                                tile_elevation[x][y] = 0;

                            }
                        }
                            break;
                        case 3:
                        {
                            if (o_odds < (ocean_level / 2.5) ) {
                                tile_elevation[x][y] = 0;

                            }
                        }
                            break;
                        case 4:
                        {
                            if (o_odds < (ocean_level / 2) ) {
                                tile_elevation[x][y] = 0;

                            }
                        }
                            break;

                    }
                }
            }
        }
    }


    function seed_mountains(){
// mountain tiles are seeded -- mountain seeds much more likely to form around mountain peaks
        for (var x = 0; x < columns; x++) {
            for (var y = 0; y < rows; y++) {
                if (tile_elevation[x][y] < 5  && tile_elevation[x][y] > -1)  { // don't overwrite mountain peaks or oceans
                    var r_elevation = Math.floor(Math.random()*mountain_level);
                    if (r_elevation ==1){
                        tile_elevation[x][y] = 4;
                    }
                }
            }
        }
    }



    function initial_mountain_growth()
    {
// mountains are grown from mountain peak seeds
        for (var x = 0; x < columns; x++) {
            for (var y = 0; y < rows; y++) {
                var m_count = 0; // variable that tracks how many neighbors with a mountain peak that each tile has, resets for each tile

                // mountains  cannot spread over existing elevation 4 or 5 tiles, these are mountain peaks and mountains already
                if (tile_elevation[x][y] < 4 && tile_elevation[x][y] > -1){

                    // look at neigboring tiles to see if they have mountain peaks


                    //don't look at neighbor to the left if on the left edge of map
                    if (x > 0) {
                        if (tile_elevation[x - 1][y] == 5){
                            m_count = m_count + 1;
                        }
                    }

                    //don't look at neighbor to the right if on the left edge of map
                    if (x < (columns - 1)) {
                        if (tile_elevation[x + 1][y] == 5){
                            m_count = m_count + 1;
                        }
                    }
                    //don't look at neighbor to the top if on the top edge of map
                    if (y > 0) {
                        if (tile_elevation[x][y - 1] == 5){
                            m_count = m_count + 1;
                        }
                    }

                    //don't look at neighbor to the bottom if on the bottom edge of map
                    if (y < (rows - 1)) {
                        if (tile_elevation[x][y + 1] == 5){
                            m_count = m_count + 1;
                        }
                    }
                    // set Farming emergence odds based on number of farming neihbors

                    // setting a random number, 1 - 100, to use in determining chances of farm emergence
                    var m_odds = Math.floor(Math.random()*mountain_level)

                    switch(m_count)
                    {
                        case 1:
                        {
                            if (m_odds < (mountain_level / 2) ) {
                                tile_elevation[x][y] = 4;

                            }
                        }
                            break;
                        case 2:
                        {
                            if (m_odds < (mountain_level / 1.5) ) {
                                tile_elevation[x][y] = 4;


                            }
                        }
                            break;
                        case 3:
                        {
                            if (m_odds < (mountain_level / 1.25) ) {
                                tile_elevation[x][y] = 4;

                            }
                        }
                            break;
                        case 4:
                        {
                            if (m_odds < (mountain_level / 1) ) {
                                tile_elevation[x][y] = 4;

                            }
                        }
                            break;

                    }

                    // the greater the number of neighbors with farming, the more likely farming is to emerge. There is a tiny chance for spontaneous emergence


                }
            }
        }
    }

    function grow_mountains(){
// mountains are grown from seed mountains - 1 growth iterations
        for (var i = 0; i < 1; i++) {
            for (var x = 0; x < columns; x++) {
                for (var y = 0; y < rows; y++) {
                    var m_count = 0; // variable that tracks how many neighbors with a mountain peak that each tile has, resets for each tile
                    // mountains  cannot spread over existing elevation 4 or 5 tiles, these are mountain peaks and mountains already
                    if (tile_elevation[x][y] < 4 && tile_elevation[x][y] > -1){

                        // look at neigboring tiles to see if they have mountain peaks

                        //don't look at neighbor to the left if on the left edge of map
                        if (x > 0) {
                            if (tile_elevation[x - 1][y] == 4){
                                m_count = m_count + 1;
                            }
                        }
                        //don't look at neighbor to the right if on the left edge of map
                        if (x < (columns - 1)) {
                            if (tile_elevation[x + 1][y] == 4){
                                m_count = m_count + 1;
                            }
                        }
                        //don't look at neighbor to the top if on the top edge of map
                        if (y > 0) {
                            if (tile_elevation[x][y - 1] == 4){
                                m_count = m_count + 1;
                            }
                        }

                        //don't look at neighbor to the bottom if on the bottom edge of map
                        if (y < (rows - 1)) {
                            if (tile_elevation[x][y + 1] == 4){
                                m_count = m_count + 1;
                            }
                        }

                        // setting a random number, 1 - 100, to use in determining chances of farm emergence
                        var m_odds = Math.floor(Math.random()*mountain_level)

                        // the greater the number of neighbors with farming, the more likely farming is to emerge. There is a tiny chance for spontaneous emergence
                        switch(m_count)
                        {
                            case 1:
                            {
                                if (m_odds < (mountain_level / 2) ) {
                                    tile_elevation[x][y] = 4;

                                }
                            }
                                break;
                            case 2:
                            {
                                if (m_odds < (mountain_level / 1.5) ) {
                                    tile_elevation[x][y] = 4;


                                }
                            }
                                break;
                            case 3:
                            {
                                if (m_odds < (mountain_level / 1.25) ) {
                                    tile_elevation[x][y] = 4;

                                }
                            }
                                break;
                            case 4:
                            {
                                if (m_odds < (mountain_level / 1) ) {
                                    tile_elevation[x][y] = 4;

                                }
                            }
                                break;

                        }
                    }
                }
            }
        }
    }

    function grow_coastal_plains(){

        for (var i = 0; i < 5; i++) {
            for (var x = 0; x < columns; x++) {
                for (var y = 0; y < rows; y++) {
                    var m_count = 0;
                    if (tile_elevation[x][y] == 1){

                        // look at neigboring tiles to see if they have mountain peaks

                        //don't look at neighbor to the left if on the left edge of map
                        if (x > 0) {
                            if (tile_elevation[x - 1][y] == 0){
                                m_count = m_count + 1;
                            }
                        }
                        //don't look at neighbor to the right if on the left edge of map
                        if (x < (columns - 1)) {
                            if (tile_elevation[x + 1][y] == 0){
                                m_count = m_count + 1;
                            }
                        }
                        //don't look at neighbor to the top if on the top edge of map
                        if (y > 0) {
                            if (tile_elevation[x][y - 1] == 0){
                                m_count = m_count + 1;
                            }
                        }

                        //don't look at neighbor to the bottom if on the bottom edge of map
                        if (y < (rows - 1)) {
                            if (tile_elevation[x][y + 1] == 0){
                                m_count = m_count + 1;
                            }
                        }


                        var m_odds = Math.floor(Math.random()*(51))


                        // the greater the number of neighbors with farming, the more likely farming is to emerge. There is a tiny chance for spontaneous emergence
                        switch(m_count)
                        {
                            case 1:
                            {
                                if (m_odds > 40) {
                                    tile_elevation[x][y] = 0;

                                }
                            }
                                break;
                            case 2:
                            {
                                if (m_odds > 30 ) {
                                    tile_elevation[x][y] = 0;


                                }
                            }
                                break;
                            case 3:
                            {
                                if (m_odds > 20 ) {
                                    tile_elevation[x][y] = 0;

                                }
                            }
                                break;
                            case 4:
                            {
                                if (m_odds > 10 ) {
                                    tile_elevation[x][y] = 0;

                                }
                            }
                                break;

                        }
                    }
                }
            }
        }
    }

    function seed_hills(){
// hill tiles are seeded
        for (var x = 0; x < columns; x++) {
            for (var y = 0; y < rows; y++) {
                if (tile_elevation[x][y] < 3 && tile_elevation[x][y] > -1) {
                    var r_elevation = Math.floor(Math.random()*mountain_level);
                    if (r_elevation < 3){
                        tile_elevation[x][y] = 3;
                    }
                }
            }
        }
    }


    function grow_hills(){
// hills are grown from  mountains and peaks- 2 growth iterations
        for (var i = 0; i < 2; i++) {
            for (var x = 0; x < columns; x++) {
                for (var y = 0; y < rows; y++) {
                    var m_count = 0; // variable that tracks how many neighbors with a mountain peak that each tile has, resets for each tile
                    // mountains  cannot spread over existing elevation 4 or 5 tiles, these are mountain peaks and mountains already
                    if (tile_elevation[x][y] < 3 && tile_elevation[x][y] > -1){

                        // look at neigboring tiles to see if they have mountains or peaks

                        //don't look at neighbor to the left if on the left edge of map
                        if (x > 0) {
                            if (tile_elevation[x - 1][y] > 2){
                                m_count = m_count + 1;
                            }
                        }
                        //don't look at neighbor to the right if on the left edge of map
                        if (x < (columns - 1)) {
                            if (tile_elevation[x + 1][y] > 2){
                                m_count = m_count + 1;
                            }
                        }
                        //don't look at neighbor to the top if on the top edge of map
                        if (y > 0) {
                            if (tile_elevation[x][y - 1] > 2){
                                m_count = m_count + 1;
                            }
                        }

                        //don't look at neighbor to the bottom if on the bottom edge of map
                        if (y < (rows - 1)) {
                            if (tile_elevation[x][y + 1] > 2){
                                m_count = m_count + 1;
                            }
                        }


                        var m_odds = Math.floor(Math.random()*mountain_level)

                        switch(m_count)
                        {
                            case 1:
                            {
                                if (m_odds < (mountain_level / 2.5)) {
                                    tile_elevation[x][y] = 3;

                                }
                            }
                                break;
                            case 2:
                            {
                                if (m_odds < (mountain_level / 2.0) ) {
                                    tile_elevation[x][y] = 3;


                                }
                            }
                                break;
                            case 3:
                            {
                                if (m_odds < (mountain_level / 1.5)) {
                                    tile_elevation[x][y] = 3;

                                }
                            }
                                break;
                            case 4:
                            {
                                if (m_odds < (mountain_level / 1.25) ) {
                                    tile_elevation[x][y] = 3;

                                }
                            }
                                break;

                        }

                    }
                }
            }
        }
    }
// end of grow hills


    function seed_highlands(){
// highland tiles are seeded
        for (var x = 0; x < columns; x++) {
            for (var y = 0; y < rows; y++) {
                if (tile_elevation[x][y] < 2 && tile_elevation[x][y] > -1) {
                    var r_elevation = Math.floor(Math.random()*mountain_level);
                    if (r_elevation < 3){
                        tile_elevation[x][y] = 2;
                    }
                }
            }
        }
    }

    function grow_highlands(){
// highlands are grown from  hills and mountains and peaks- 2 growth iterations
        for (var i = 0; i < 2; i++) {
            for (var x = 0; x < columns; x++) {
                for (var y = 0; y < rows; y++) {
                    var m_count = 0; // variable that tracks how many neighbors with a mountain peak or mountain or hill that each tile has, resets for each tile
                    // highlands  cannot spread over existing elevation 2,3,4 or 5 tiles
                    if (tile_elevation[x][y] < 2 && tile_elevation[x][y] > -1){

                        // look at neigboring tiles to see if they have mountains or peaks

                        //don't look at neighbor to the left if on the left edge of map
                        if (x > 0) {
                            if (tile_elevation[x - 1][y] > 1){
                                m_count = m_count + 1;
                            }
                        }
                        //don't look at neighbor to the right if on the left edge of map
                        if (x < (columns - 1)) {
                            if (tile_elevation[x + 1][y] > 1){
                                m_count = m_count + 1;
                            }
                        }
                        //don't look at neighbor to the top if on the top edge of map
                        if (y > 0) {
                            if (tile_elevation[x][y - 1] > 1){
                                m_count = m_count + 1;
                            }
                        }

                        //don't look at neighbor to the bottom if on the bottom edge of map
                        if (y < (rows - 1)) {
                            if (tile_elevation[x][y + 1] > 1){
                                m_count = m_count + 1;
                            }
                        }


                        var m_odds = Math.floor(Math.random()*mountain_level)

                        switch(m_count)
                        {
                            case 1:
                            {
                                if (m_odds < (mountain_level / 2.5)) {
                                    tile_elevation[x][y] = 2;

                                }
                            }
                                break;
                            case 2:
                            {
                                if (m_odds < (mountain_level / 2.0) ) {
                                    tile_elevation[x][y] = 2;


                                }
                            }
                                break;
                            case 3:
                            {
                                if (m_odds < (mountain_level / 1.5)) {
                                    tile_elevation[x][y] = 2;

                                }
                            }
                                break;
                            case 4:
                            {
                                if (m_odds < (mountain_level / 1.25) ) {
                                    tile_elevation[x][y] = 2;

                                }
                            }
                                break;

                        }

                    }
                }
            }
        }
    }




    tiles_elevation(); // calls function which establishes elevation of tiles on the map

    seed_peaks();

    seed_oceans();
    initial_ocean_growth();
    fill_oceans();
    remove_peaks_from_ocean();
    uneven_coastline();


    seed_mountains();
    initial_mountain_growth();
    grow_mountains();

    seed_hills();
    grow_hills();

    seed_highlands();
    grow_highlands();

    seed_coastal_plain();
    grow_coastal_plains();

    seed_lakes();
    lake_growth();

}
// end of elevation carving ///////////////////////////////////////////////////////////////
