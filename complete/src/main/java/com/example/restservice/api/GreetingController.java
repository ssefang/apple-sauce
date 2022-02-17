package com.example.restservice.api;

import java.util.concurrent.atomic.AtomicLong;

import com.example.restservice.model.Address;
import com.example.restservice.model.Greeting;
import com.example.restservice.model.Person;
import org.springframework.web.bind.annotation.*;

@RestController
public class GreetingController {

	private static final String template = "Hello, %s!";
	private final AtomicLong counter = new AtomicLong();

	@GetMapping("/greeting")
	public Greeting greeting(@RequestParam(value = "name", defaultValue = "World") String name) {
		return new Greeting(counter.incrementAndGet(), String.format(template, name));
	}

	@GetMapping("/person")
	//http://localhost:8080/person?firstname=brad&lastname=Pitt
	public Person getPerson(@RequestParam(value = "firstname") String fname,
							@RequestParam(value = "lastname") String lname){
		//validation methods
		return new Person(fname, lname);
	}

	@PostMapping("/person")
//	@RequestMapping(value = "/person", method = RequestMethod.POST)
	public String createPerson(@RequestBody Person person) {
		System.out.println(person);
		return "person is created";
	}

	@GetMapping("/address")
	//http://localhost:8080/person?firstname=brad&lastname=Pitt
	public Address getAddress(@RequestParam(value = "id") int id,
							  @RequestParam(value = "street") String street,
							  @RequestParam(value = "postCode") String postCode) {
		//validation methods
		return new Address(id, street,postCode);
	}

	@PostMapping("/address")
//	@RequestMapping(value = "/person", method = RequestMethod.POST)
	public String createAddress(@RequestBody Address address) {
		System.out.println(address);
		return "address is created";
	}
}
