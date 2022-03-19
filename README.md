# POST

    http://127.0.0.1:8000/api/register

# Requests

    {
         "name" : "Aravind",
         "email" : "aravind@gmail.com",
         "password" : "Password@123" ,
         "password_confirmation" : "Password@123"
    }
    
# POST

    http://127.0.0.1:8000/api/login

# Requests

    {
         "email" : "aravind@gmail.com",
         "password" : "Password@123" 
    }
    
# POST

    http://127.0.0.1:8000/api/logout
    
# GET

    http://127.0.0.1:8000/api/feedback
    
# Responses

    {
        
    "data": [
        {
            "id": 3,
            "title": "Customer Experience Updated",
            "slug": "customer-experience-updated",
            "status": true,
            "description": "Feedback Updated form for customer experience",
            "created_at": "2022-03-19 07:42:56",
            "updated_at": "2022-03-19 07:47:10",
            "expire_date": "2023-01-18",
            "questions": [
                {
                    "id": 5,
                    "type": "checkbox",
                    "question": "Which Product did you loved most? Updated",
                    "description": "Product Satisfaction Updated",
                    "data": {
                        "options": [
                            {
                                "uuid": "hagvavcsjvajsv422222",
                                "text": "Soap"
                            },
                            {
                                "uuid": "hagvavcsjvajsv422232",
                                "text": "Toothpaste"
                            },
                            {
                                "uuid": "hagvavcsjvajsv422242",
                                "text": "Snacks"
                            },
                            {
                                "uuid": "hagvavcsjvajsv422252",
                                "text": "Can food"
                            }
                        ]
                    }
                },
                {
                    "id": 6,
                    "type": "text",
                    "question": "How can we increase our productivity? Updated",
                    "description": "Product Satisfaction Updated",
                    "data": []
                }
            ]
        },
        {
            "id": 4,
            "title": "Employment Experience",
            "slug": "employment-experience",
            "status": true,
            "description": "Feedback form for employment experience",
            "created_at": "2022-03-19 07:51:14",
            "updated_at": "2022-03-19 07:51:14",
            "expire_date": "2023-01-18",
            "questions": [
                {
                    "id": 7,
                    "type": "checkbox",
                    "question": "How was your overall experience?",
                    "description": "Employment Satisfaction",
                    "data": {
                        "options": [
                            {
                                "uuid": "hagvavcsjvajsv422222",
                                "text": "Good"
                            },
                            {
                                "uuid": "hagvavcsjvajsv422232",
                                "text": "Very Good"
                            },
                            {
                                "uuid": "hagvavcsjvajsv422242",
                                "text": "Bad"
                            },
                            {
                                "uuid": "hagvavcsjvajsv422252",
                                "text": "Very Bad"
                            }
                        ]
                    }
                },
                {
                    "id": 8,
                    "type": "text",
                    "question": "How can we increase our productivity?",
                    "description": "Product Satisfaction",
                    "data": []
                }
            ]
        }
    ],
    "links": {
        "first": "http://127.0.0.1:8000/api/feedback?page=1",
        "last": "http://127.0.0.1:8000/api/feedback?page=1",
        "prev": null,
        "next": null
    },
    "meta": {
        "current_page": 1,
        "from": 1,
        "last_page": 1,
        "links": [
            {
                "url": null,
                "label": "&laquo; Previous",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/feedback?page=1",
                "label": "1",
                "active": true
            },
            {
                "url": null,
                "label": "Next &raquo;",
                "active": false
            }
        ],
        "path": "http://127.0.0.1:8000/api/feedback",
        "per_page": 15,
        "to": 2,
        "total": 2
    }
     }

# POST
    
     http://127.0.0.1:8000/api/feedback

# Requests

    {

        "title": "Customer Experience",
        "status": true,
        "description": "Feedback form for customer experience",
        "expire_date": "2023-01-18",
        "user_id" : 1,
        "questions": [
            {
                "type": "checkbox",
                "question": "Which Product did you loved most?",
                "description": "Product Satisfaction",
                "data": {
                    "options": [
                        {
                            "uuid": "hagvavcsjvajsv422222",
                            "text": "Soap"
                        },
                        {
                            "uuid": "hagvavcsjvajsv422232",
                            "text": "Toothpaste"
                        },
                        {
                            "uuid": "hagvavcsjvajsv422242",
                            "text": "Snacks"
                        },
                        {
                            "uuid": "hagvavcsjvajsv422252",
                            "text": "Can food"
                        }
                    ]
                }
            },
            {
                "type": "text",
                "question": "How can we increase our productivity?",
                "description": "Product Satisfaction ",
                "data": {
                }
            }
        ]
    
      }

# PUT

    http://127.0.0.1:8000/api/feedback/3

# Requests

    {

        "title": "Customer Experience Updated",
        "status": true,
        "description": "Feedback Updated form for customer experience",
        "expire_date": "2023-01-18",
        "user_id" : 1,
        "questions": [
            {
                "id" : 5,
                "type": "checkbox",
                "question": "Which Product did you loved most? Updated",
                "description": "Product Satisfaction Updated",
                "data": {
                    "options": [
                        {
                            "uuid": "hagvavcsjvajsv422222",
                            "text": "Soap"
                        },
                        {
                            "uuid": "hagvavcsjvajsv422232",
                            "text": "Toothpaste"
                        },
                        {
                            "uuid": "hagvavcsjvajsv422242",
                            "text": "Snacks"
                        },
                        {
                            "uuid": "hagvavcsjvajsv422252",
                            "text": "Can food"
                        }
                    ]
                }
            },
            {
                "id":6,
                "type": "text",
                "question": "How can we increase our productivity? Updated",
                "description": "Product Satisfaction Updated",
                "data": {
                }
            }
        ]
    
    }

# DELETE

    http://127.0.0.1:8000/api/feedback/4
    
# GET

    http://127.0.0.1:8000/api/feedback-by-slug/customer-experience-updated
    
# POST

    http://127.0.0.1:8000/api/feedback/3/answer

# Requests

    {
         "answers" : {
                        "5" : ["Snacks","Can food"],
                        "6" : "Sell Online"
                     }
    }
    
# GET

    http://127.0.0.1:8000/api/feedback/3/answer
    
# Responses

    {
    "response": [
        {
            "id": 4,
            "feedback_question_id": 5,
            "feedback_answer_id": 4,
            "answer": "[\"Snacks\",\"Can food\"]",
            "created_at": "2022-03-19T07:59:33.000000Z",
            "updated_at": "2022-03-19T07:59:33.000000Z"
        },
        {
            "id": 5,
            "feedback_question_id": 6,
            "feedback_answer_id": 4,
            "answer": "Sell Online",
            "created_at": "2022-03-19T07:59:33.000000Z",
            "updated_at": "2022-03-19T07:59:33.000000Z"
        }
    ]
      }
   
# GET

    http://127.0.0.1:8000/api/dashboard
    
# Responses

     {
    "totalFeedbacks": 1,
    "latestFeedback": {
        "id": 3,
        "title": "Customer Experience Updated",
        "slug": "customer-experience-updated",
        "status": true,
        "created_at": "2022-03-19 07:42:56",
        "expire_date": "2023-01-18 00:00:00",
        "questions": 2,
        "answers": 4
    },
    "totalAnswers": 4,
    "latestAnswers": [
        {
            "id": 4,
            "feedback": {
                "id": 3,
                "title": "Customer Experience Updated",
                "slug": "customer-experience-updated",
                "status": true,
                "description": "Feedback Updated form for customer experience",
                "created_at": "2022-03-19 07:42:56",
                "updated_at": "2022-03-19 07:47:10",
                "expire_date": "2023-01-18",
                "questions": [
                    {
                        "id": 5,
                        "type": "checkbox",
                        "question": "Which Product did you loved most? Updated",
                        "description": "Product Satisfaction Updated",
                        "data": {
                            "options": [
                                {
                                    "uuid": "hagvavcsjvajsv422222",
                                    "text": "Soap"
                                },
                                {
                                    "uuid": "hagvavcsjvajsv422232",
                                    "text": "Toothpaste"
                                },
                                {
                                    "uuid": "hagvavcsjvajsv422242",
                                    "text": "Snacks"
                                },
                                {
                                    "uuid": "hagvavcsjvajsv422252",
                                    "text": "Can food"
                                }
                            ]
                        }
                    },
                    {
                        "id": 6,
                        "type": "text",
                        "question": "How can we increase our productivity? Updated",
                        "description": "Product Satisfaction Updated",
                        "data": []
                    }
                ]
            },
            "end_date": "2022-03-19 07:59:33"
        },
        {
            "id": 3,
            "feedback": {
                "id": 3,
                "title": "Customer Experience Updated",
                "slug": "customer-experience-updated",
                "status": true,
                "description": "Feedback Updated form for customer experience",
                "created_at": "2022-03-19 07:42:56",
                "updated_at": "2022-03-19 07:47:10",
                "expire_date": "2023-01-18",
                "questions": [
                    {
                        "id": 5,
                        "type": "checkbox",
                        "question": "Which Product did you loved most? Updated",
                        "description": "Product Satisfaction Updated",
                        "data": {
                            "options": [
                                {
                                    "uuid": "hagvavcsjvajsv422222",
                                    "text": "Soap"
                                },
                                {
                                    "uuid": "hagvavcsjvajsv422232",
                                    "text": "Toothpaste"
                                },
                                {
                                    "uuid": "hagvavcsjvajsv422242",
                                    "text": "Snacks"
                                },
                                {
                                    "uuid": "hagvavcsjvajsv422252",
                                    "text": "Can food"
                                }
                            ]
                        }
                    },
                    {
                        "id": 6,
                        "type": "text",
                        "question": "How can we increase our productivity? Updated",
                        "description": "Product Satisfaction Updated",
                        "data": []
                    }
                ]
            },
            "end_date": "2022-03-19 07:58:25"
        },
        {
            "id": 2,
            "feedback": {
                "id": 3,
                "title": "Customer Experience Updated",
                "slug": "customer-experience-updated",
                "status": true,
                "description": "Feedback Updated form for customer experience",
                "created_at": "2022-03-19 07:42:56",
                "updated_at": "2022-03-19 07:47:10",
                "expire_date": "2023-01-18",
                "questions": [
                    {
                        "id": 5,
                        "type": "checkbox",
                        "question": "Which Product did you loved most? Updated",
                        "description": "Product Satisfaction Updated",
                        "data": {
                            "options": [
                                {
                                    "uuid": "hagvavcsjvajsv422222",
                                    "text": "Soap"
                                },
                                {
                                    "uuid": "hagvavcsjvajsv422232",
                                    "text": "Toothpaste"
                                },
                                {
                                    "uuid": "hagvavcsjvajsv422242",
                                    "text": "Snacks"
                                },
                                {
                                    "uuid": "hagvavcsjvajsv422252",
                                    "text": "Can food"
                                }
                            ]
                        }
                    },
                    {
                        "id": 6,
                        "type": "text",
                        "question": "How can we increase our productivity? Updated",
                        "description": "Product Satisfaction Updated",
                        "data": []
                    }
                ]
            },
            "end_date": "2022-03-19 07:57:44"
        },
        {
            "id": 1,
            "feedback": {
                "id": 3,
                "title": "Customer Experience Updated",
                "slug": "customer-experience-updated",
                "status": true,
                "description": "Feedback Updated form for customer experience",
                "created_at": "2022-03-19 07:42:56",
                "updated_at": "2022-03-19 07:47:10",
                "expire_date": "2023-01-18",
                "questions": [
                    {
                        "id": 5,
                        "type": "checkbox",
                        "question": "Which Product did you loved most? Updated",
                        "description": "Product Satisfaction Updated",
                        "data": {
                            "options": [
                                {
                                    "uuid": "hagvavcsjvajsv422222",
                                    "text": "Soap"
                                },
                                {
                                    "uuid": "hagvavcsjvajsv422232",
                                    "text": "Toothpaste"
                                },
                                {
                                    "uuid": "hagvavcsjvajsv422242",
                                    "text": "Snacks"
                                },
                                {
                                    "uuid": "hagvavcsjvajsv422252",
                                    "text": "Can food"
                                }
                            ]
                        }
                    },
                    {
                        "id": 6,
                        "type": "text",
                        "question": "How can we increase our productivity? Updated",
                        "description": "Product Satisfaction Updated",
                        "data": []
                    }
                ]
            },
            "end_date": "2022-03-19 07:56:57"
        }
    ]
     }


    

   
   
