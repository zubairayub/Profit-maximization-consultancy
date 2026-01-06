<?php

namespace App\Notifications;

use App\Models\ContactSubmission;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewContactSubmissionNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public function __construct(public ContactSubmission $submission)
    {
        //
    }

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        $packageMap = [
            'silver' => 'Silver Package ($7,500–$12,000/month)',
            'gold' => 'Gold Package ($18,000–$30,000/month)',
            'platinum' => 'Platinum Package ($40,000–$75,000/month)',
            'project' => 'High-Value Project',
        ];

        return (new MailMessage)
            ->subject('New Strategic Dialogue Request - ' . $this->submission->company)
            ->greeting('New Contact Submission')
            ->line('A new strategic dialogue request has been submitted:')
            ->line('**Company:** ' . $this->submission->company)
            ->line('**Contact:** ' . $this->submission->name . ' (' . $this->submission->title . ')')
            ->line('**Email:** ' . $this->submission->email)
            ->line('**Phone:** ' . ($this->submission->phone ?: 'Not provided'))
            ->line('**Interest:** ' . ($packageMap[$this->submission->interest] ?? $this->submission->interest))
            ->line('**Company Size:** ' . $this->submission->company_size)
            ->line('**Challenge:** ' . $this->submission->challenge)
            ->action('View in Admin Panel', route('admin.contacts.show', $this->submission))
            ->line('Please review and follow up within 24 hours.');
    }

    public function toArray(object $notifiable): array
    {
        return [
            'submission_id' => $this->submission->id,
            'company' => $this->submission->company,
        ];
    }
}
