<?php

// I feel that the solution to the problem of assigning level or progression to the goals of a character could be implemented by actually introducing the levels in the goals
//In other words, it would be a good idea to actually add the record of the level in the goals array.
//This would also come with the fact that there must be categories to which a goal belongs or if not, just a certain level to which the goal would belong
//In this code example I would implement the goal with levels and statuses which would keep track of the goal level and whether it is accomplished or not.

class Character_Generator {

    //Initiation of Id, character variable
    public $id = 0;
    public static $character;

    //function for getting default values for the various variables used further for implementation of the characters
    public function getDefaults() {
        $time = time();
        $id = $this->id;
        return array('id' => $id,
            'foreign_id' => 0,
            'type' => 'stock_profile',
            'created' => $time,
            'modified' => $time,
        );
    }

    //I am assuming here that the purpose of the if statement is in context to the remaining code which might be present in the system
    //Because if that is not the case, initializing the class if the character's empty won't make any sense, as the character variable
    //will still be empty. However, I am assuming that this class in the actual code would also contain another function which fetches characters
    //on initializing the class, in which case the if statement makes perfect sense and is an example of excellent code.
    public static function stock() {
        if (empty(static::$character)) {
            new self;
        }
        return static::$character;
    }


    //constructor for initializing the character variable
    public function __construct() {

        static::$character = array(
            ++$this->id => array_merge($this->getDefaults(), array(
                'name' => 'Donald',
                'description' => 'Character 1',
                'meta' => array(
                    'periodic_cashflow' => array(
                        0 => array(
                            'name' => 'Payment 1',
                            'period' => 30,
                            'value' => -5000
                        ),
                        1 => array(
                            'name' => 'Payment 2',
                            'period' => 30,
                            'value' => -1000
                        )
                    ), 'likes' => 'Object X', 'dislikes' => 'Activity X', 'birthday' => '9/06/1980',
                    'goals' => array(
                        0 => array(
                            'name' => 'Donald\'s Goal 1',
                            'markers' => array(
                                'cash' => 0,
                                'accumulated_comfort' => 52*45,
                                'accumulated_responsibility' => 52*55
                            ),
                            'level' => 1,
                            'status' => 'Not Accmomplished' //The reason that I kept this meta as string is that there could be more than two possibilities whether the goal is accomplished, pending or something more.
                                                            //This could be also be done using an ENUM
                        ),
                        1 => array(
                            'name' => 'Donald\'s Goal 2',
                            'markers' => array(
                                'cash' => 1000,
                                'accumulated_comfort' => 52*15,
                                'accumulated_responsibility' => 52*45
                            ),
                            'level' => 1,
                            'status' => 'Not Accmomplished'
                        ),
                    ),
                    'flags' => array(
                        'divorced' => 1
                    ),
                    'start_position' => array(
                        'career' => array(
                            'title' => 'Engineer',
                            'earnings' => 95000,
                            'field' => 'Engineering'
                        ),
                        'cash' => 22000,
                        'housing' => 'homeowner'
                    )
                )
            )),
            ++$this->id => array_merge($this->getDefaults(), array(
                'name' => 'Lola',
                'description' => 'Character 2',
                'meta' => array(
                    'periodic_cashflow' => array(
                        0 => array(
                            'name' => 'Bartending',
                            'period' => 14,
                            'value' => 300
                        ),
                    ), 'likes' => 'Activity A, Actiity B', 'dislikes' => 'Object X, Activity Y', 'birthday' => '1/12/1986',
                    'goals' => array(
                        0 => array(
                            'name' => 'Lola\'s Goal 1',
                            'markers' => array(
                                'flags' => array('no_tuition_debt')
                            ),
                            'level' => 1,
                            'status' => 'Not Accmomplished'
                        ),
                        1 => array(
                            'name' => 'Lola\'s Goal 2',
                            'markers' => array(
                                'accumulated_comfort' => 52*40,
                                'accumulated_responsibility' => 52*15
                            ),
                            'level' => 1,
                            'status' => 'Not Accmomplished'
                        ),
                    ),
                    'flags' => array(
                        'married' => 1,
                        'dependents' => 1
                    ),
                    'start_position' => array(
                        'housing' => array('mortgage' => 178000),
                        'education' => array(
                            'level' => 'university',
                            'field' => 'Education',
                            'loan' => 20000
                        ),
                        'cash' => 12000,
                        'career' => array(
                            'title' => 'Teacher',
                            'earnings' => 42000,
                            'field' => 'Education'
                        ),
                    )
                ),
            )),
            ++$this->id => array_merge($this->getDefaults(), array(
                'name' => 'James',
                'description' => 'Character 3',
                'meta' => array(
                    'periodic_cashflow' => array(
                    ),
                    'likes' => 'Activity A', 'dislikes' => 'Personality B',
                    'birthday' => date('m/d/Y', time() - (22*86400*365) - rand(0, 86400*365)),
                    'goals' => array(
                        0 => array(
                            'name' => 'James\'s Goal 1',
                            'markers' => array(
                                'cash' => 52*870,
                                'accumulated_comfort' => 52*30
                            )
                        ),
                        1 => array(
                            'name' => 'James\'s Goal 2',
                            'markers' => array(
                                'cash' => 1.4 * 7000
                            )
                        )
                    ),
                    'flags' => array(
                    ),
                    'start_position' => array(
                        'cash' => 7000,
                        'education' => array(
                            'education' => array(
                                'level' => 'university',
                                'field' => 'Finance',
                                'loan' => 40000
                            ),
                        ),
                    )
                ),
            )),
            ++$this->id => array_merge($this->getDefaults(), array(
                'name' => 'Kendrick',
                'description' => 'Character 4',
                'meta' => array(
                    'periodic_cashflow' => array(
                        0 => array(
                            'name' => 'DJ',
                            'period' => 30,
                            'value' => 400
                        ),
                    ),
                    'likes' => 'Object A', 'dislikes' => 'Activity B & Regulation C',
                    'birthday' => date('m/d/Y', time() - (21*86400*365) - rand(0, 86400*365)),
                    'goals' => array(
                        0 => array(
                            'name' => 'Kendrick\'s Goal 1',
                            'markers' => array(
                                'cash' => 900,
                            )
                        ),
                        1 => array(
                            'name' => 'Kendrick\'s Goal 2',
                            'markers' => array(
                                'responsibility_ratio' => 1.2,
                                'accumulated_responsibility' => 52*9,
                            )
                        ),
                        2 => array(
                            'name' => 'Kendrick\'s Goal 3',
                            'markers' => array(
                                'accumulated_wisdom' => 26 * 40
                            )
                        )
                    ),
                    'flags' => array(
                    ),
                    'start_position' => array(
                        'housing' => 'renter',
                        'cash' => 300,
                        'cc_balance' => 300,
                        'education' => array(
                            'matriculation' => 0.75,
                            'level' => 'university',
                            'field' => 'Music',
                            'loan' => 30000
                        ),
                    )
                ),
            )),
            ++$this->id => array_merge($this->getDefaults(), array(
                'name' => 'Eliana',
                'description' => 'Character 5',
                'meta' => array(
                    'periodic_cashflow' => array(
                    ),
                    'likes' => 'Object A, Object B',
                    'dislikes' => 'Activity C',
                    'birthday' => date('m/d/Y', time() - (24*86400*365) - rand(0, 86400*365)),
                    'goals' => array(
                        0 => array(
                            'name' => 'Eliana\'s Goal 1',
                            'markers' => array(
                                'responsibility_ratio' => 1.5,
                                'accumulated_responsibility' => 52*40,
                            )
                        ),
                        1 => array(
                            'name' => 'Eliana\'s Goal 2',
                            'markers' => array(
                                'cash' => 5000,
                                'accumulated_responsibility' => 52*15
                            )
                        ),
                        2 => array(
                            'name' => 'Eliana\'s Goal 3',
                            'markers' => array(
                                'accumulated_responsibility' => 52*65
                            )
                        ),
                        3 => array(
                            'name' => 'Eliana\'s Goal 4',
                            'markers' => array(
                                'accumulated_responsibility' => 52*42
                            )
                        )
                    ),
                    'flags' => array(
                    ),
                    'start_position' => array(
                        'housing' => 'renter',
                        'cash' => 2000,
                        'education' => array(
                            'level' => 'university',
                            'field' => 'Music',
                            'loan' => 25000
                        ),
                        'career' => array(
                            'title' => 'Office Assistant',
                            'earnings' => 58000,
                            'field' => 'Finance'
                        ),
                    )
                ),
            )),
            ++$this->id => array_merge($this->getDefaults(), array(
                'name' => 'Marco',
                'description' => 'Character 6',
                'meta' => array(
                    'periodic_cashflow' => array(
                    ),
                    'likes' => 'Acticity A, Obecjt B, Activity C',
                    'dislikes' => 'Object X, Object Y',
                    'birthday' => date('m/d/Y', time() - (23*86400*365) - rand(0, 86400*365)),
                    'goals' => array(
                        0 => array(
                            'name' => 'Marco\'s Goal 1',
                            'markers' => array(
                                'responsibility_ratio' => 1.2,
                                'cash' => 5000,
                                'accumulated_responsibility' => 52*30,
                            )
                        ),
                        1 => array(
                            'name' => 'Marco\'s Goal 2',
                            'markers' => array(
                                'cash' => 8000,
                                'accumulated_comfort' => 52*35,
                            )
                        )
                    ),
                    'flags' => array(
                    ),
                    'start_position' => array(
                        'housing' => 'renter', 
                        'cash' => 1700,
                        'education' => array(
                            'level' => 'university',
                            'field' => 'Media',
                            'loan' => 40000
                        ),
                        'career' => array(
                            'title' => 'Photographer',
                            'earnings' => 32400,
                            'field' => 'Media'
                        ),
                    )
                ),
            )),
        );
    }

}

$characters =  Character_Generator::stock();
$characterKey = rand(1, count($characters));
$character = $characters[$characterKey];

echo "<pre>";
print_r($character);